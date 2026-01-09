<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController; // อย่าลืม use Controller
use App\Http\Controllers\PokedexesController;

Route::get('/', function () {
    return view('html101');
});
Route::get('/se', function () {
    return view('template.default');
});
Route::get('/view2', function () {
    return view('template.default');
});
Route::get('/mycontroller', [App\Http\Controllers\Mycon::class, 'index']);
Route::post('/mycontroller', [App\Http\Controllers\Mycon::class, 'process']);

Route::get('/user', [App\Http\Controllers\user::class, 'index']);
Route::post('/user', [App\Http\Controllers\user::class, 'store']);

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/flights', 'FlightsController@index');
    Route::post('/flight', 'FlightsController@store');
    Route::post('/flight/{id}', 'FlightsController@update_action');
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/pokedexes', 'PokedexesController@index');
    Route::post('/pokedex', 'PokedexesController@store');
    Route::get('/pokedex/{id}/edit', 'PokedexesController@edit');
    Route::put('/pokedex/{id}', 'PokedexesController@update');
    Route::get('/pokedex/{name}', 'PokedexesController@info');
    Route::delete('/pokedex/{id}', 'PokedexesController@delete');
});

use App\Http\Controllers\PokeScrapeController;

Route::get('/run-scrape', [PokeScrapeController::class, 'index']);