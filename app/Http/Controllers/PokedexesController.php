<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use Illuminate\Http\Request;

class PokedexesController extends Controller
{
    public function index()
    {
        $data['pokedexes'] = Pokedex::select(
            'id',
            'image_url',
            'name',
            'type',
            'species'
        )->get();
        foreach ($data['pokedexes'] as $poke) {
            $poke->type = explode(',', $poke->type);
        }

        return view('pokedex.index', $data);
    }

    public function store(Request $request)
    {
        $pokedex = new Pokedex;
        $pokedex->image_url = $request->input('image_url');
        $pokedex->name = $request->input('name');
        $pokedex->type = $request->input('type');
        $pokedex->species = $request->input('species');
        $pokedex->height = $request->input('height');
        $pokedex->weight = $request->input('weight');
        $pokedex->hp = $request->input('hp');
        $pokedex->attack = $request->input('attack');
        $pokedex->defense = $request->input('defense');
        $pokedex->save();

        return redirect('/pokedexes');
    }

    public function edit($id)
    {
        $data['pokedexes_update'] = Pokedex::find($id);   // ตัวเดียว (edit)
        $data['pokedexes'] = Pokedex::select(
            'id',
            'image_url',
            'name',
            'type',
            'species'
        )->get();
        foreach ($data['pokedexes'] as $poke) {
            $poke->type = explode(',', $poke->type);
        }

        return view('pokedex.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $pokedex = Pokedex::find($id);
        $pokedex->name = $request->input('name');
        $pokedex->type = $request->input('type');
        $pokedex->species = $request->input('species');
        $pokedex->height = $request->input('height');
        $pokedex->weight = $request->input('weight');
        $pokedex->hp = $request->input('hp');
        $pokedex->attack = $request->input('attack');
        $pokedex->defense = $request->input('defense');
        $pokedex->image_url = $request->input('image_url');
        $pokedex->save();

        return redirect('/pokedexes');
    }

    public function info($id)
    {
        // 1. หาข้อมูลมาก่อน
        $pokedex = Pokedex::find($id);

        // 2. เช็คว่าเจอไหม (ป้องกัน Error กรณีใส่ ID มั่ว)
        if (! $pokedex) {
            return abort(404); // หรือ redirect กลับไปหน้าแรก
        }

        // 3. แปลง type จาก "Fire,Flying" เป็น Array ["Fire", "Flying"]
        // ทำตรงๆ กับตัวแปรเลย ไม่ต้องวนลูป
        $pokedex->type = explode(',', $pokedex->type);

        // 4. ส่งไปที่ View
        $data['pokedex'] = $pokedex;

        return view('pokedex.info', $data);
    }

    public function delete($id)
    {
        $pokedex = Pokedex::find($id);
        if ($pokedex) {
            $pokedex->delete();
        }

        return redirect('/pokedexes');
    }
}