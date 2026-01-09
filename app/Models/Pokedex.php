<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    // เพิ่มบรรทัดนี้กลับเข้าไปครับ
    protected $table = 'pokedexes'; 

    protected $fillable = [
        'name', 'type', 'species', 'height', 'weight',
        'hp', 'attack', 'defense', 'image_url'
    ];
}