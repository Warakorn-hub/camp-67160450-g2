<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController; // อย่าลืม use Controller

Route::get('/', function () {
    return view('html101');
});
Route::get('/se', function () {
    return view('template.default');
});
Route::get('/view2', function () {
    return view('template.default');
});
Route::post('/submit-form', [MyController::class, 'submitForm']);
