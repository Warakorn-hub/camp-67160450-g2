<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // <--- เพิ่มตัวนี้เพื่อดู Log
use Symfony\Component\DomCrawler\Crawler;

class PokeScrapeController extends Controller
{
    public function index(Request $request)
    {
        // 1. เริ่มจับเวลา (Start Timer)
        $startTime = microtime(true);

        Log::info('--- START SCRAPING (Sequential Mode) ---');

        $limit = $request->input('limit', 100);
        Pokedex::truncate();

        try {
            $response = Http::withoutVerifying()
                ->withHeaders(['User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'])
                ->get('https://pokemondb.net/pokedex/all');

        } catch (\Exception $e) {
            Log::error('Main Page Error: '.$e->getMessage());

            return 'Error loading main page.';
        }

        $html = $response->body();
        $crawler = new Crawler($html);

        $allTargets = $crawler->filter('#pokedex tbody tr')->each(function (Crawler $node) {
            $linkNode = $node->filter('.ent-name');

            return $linkNode->count() > 0 ? 'https://pokemondb.net'.$linkNode->attr('href') : null;
        });

        $uniqueTargets = array_unique(array_filter($allTargets));
        $finalTargets = array_slice($uniqueTargets, 0, $limit);

        Log::info('Found '.count($finalTargets).' targets. Starting loop...');

        $count = 0;
        foreach ($finalTargets as $url) {
            $count++;

            try {
                $response = Http::withoutVerifying()
                    ->withHeaders([
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                    ])
                    ->timeout(30)
                    ->get($url);

                if ($response->successful()) {
                    $this->parseAndSave($response->body(), $url);

                    // คำนวณเวลา ณ ปัจจุบันของตัวนี้
                    $currentTime = round(microtime(true) - $startTime, 2);
                    Log::info("[$count/$limit] Success: $url (Elapsed: {$currentTime}s)");
                } else {
                    Log::error("[$count/$limit] Failed Status ".$response->status().": $url");
                }

                usleep(200000); // พัก 0.2 วิ

            } catch (\Exception $e) {
                Log::error("[$count/$limit] Exception on $url: ".$e->getMessage());
            }
        }

        // 2. หยุดจับเวลาและคำนวณผลรวม (End Timer)
        $endTime = microtime(true);
        $totalDuration = round($endTime - $startTime, 2);

        $message = "Scraping Finished! Processed $count Pokemon in $totalDuration seconds.";

        Log::info('--------------------------------------------------');
        Log::info($message);
        Log::info('--------------------------------------------------');

        return $message;
    }

    private function parseAndSave($html, $url)
    {
        try {
            $crawler = new Crawler($html);

            if ($crawler->filter('h1')->count() == 0) {
                Log::warning("No H1 found for URL: $url");

                return;
            }

            $name = $crawler->filter('h1')->text();
            Log::info("Scraping: $name"); // บอกชื่อตัวที่กำลังทำ

            if (Pokedex::where('name', $name)->exists()) {
                Log::info("Skipped (Duplicate): $name");

                return;
            }

            // --- ส่วนดึงข้อมูล ---
            $imageNode = $crawler->filter('a[rel="lightbox"]');
            $imageUrl = $imageNode->count() ? $imageNode->attr('href') : '';

            $types = $crawler->filter('.vitals-table tr th:contains("Type")')->nextAll()->filter('a.type-icon')->each(fn ($node) => $node->text());
            $typeString = implode(',', $types);

            // ใช้ try-catch ย่อยๆ หรือตรวจสอบ count ก่อนดึง text เสมอ
            $species = $this->safeText($crawler, '//th[text()="Species"]/following-sibling::td');

            $heightRaw = $this->safeText($crawler, '//th[text()="Height"]/following-sibling::td');
            $height = (float) filter_var($heightRaw, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            $weightRaw = $this->safeText($crawler, '//th[text()="Weight"]/following-sibling::td');
            $weight = (float) filter_var($weightRaw, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            $hp = (int) $this->safeText($crawler, '//th[text()="HP"]/following-sibling::td[@class="cell-num"]', true);
            $attack = (int) $this->safeText($crawler, '//th[text()="Attack"]/following-sibling::td[@class="cell-num"]', true);
            $defense = (int) $this->safeText($crawler, '//th[text()="Defense"]/following-sibling::td[@class="cell-num"]', true);

            // บันทึก
            Pokedex::create([
                'name' => $name,
                'type' => $typeString,
                'species' => $species,
                'height' => $height,
                'weight' => $weight,
                'hp' => $hp,
                'attack' => $attack,
                'defense' => $defense,
                'image_url' => $imageUrl,
            ]);

        } catch (\Exception $e) {
            // จุดสำคัญ: ถ้า Error ให้ปริ้นออกมาดู
            Log::error("Error saving $url : ".$e->getMessage());
        }
    }

    // ฟังก์ชันช่วยดึง text แบบปลอดภัย (ถ้าหาไม่เจอให้คืนค่าว่าง ไม่ error)
    private function safeText($crawler, $xpath, $first = false)
    {
        $node = $crawler->filterXPath($xpath);
        if ($node->count() > 0) {
            return $first ? $node->first()->text() : $node->text();
        }

        return '';
    }
}