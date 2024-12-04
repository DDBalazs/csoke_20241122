<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzakController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PizzakController::class, 'akcios']);
Route::get('/adatlap/{id}', [PizzakController::class, 'adatlap']);   ## Tipuspélda adatlap útvonalára
Route::get('/all', [PizzakController::class, 'osszes']);             ## Rendezés nélkül
Route::get('/all/{p}', [PizzakController::class, 'osszes2']);        ## Rendezéssel
Route::get('/rnd', [PizzakController::class, 'rnd']);

Route::view('/add', 'add');                                          ## nézet + útvonal
Route::post('/add', [PizzakController::class, 'AddData']);           ## Ez a gomb lenyomáshoz kell

Route::get('/mod', [PizzakController::class, 'Mod']);
Route::get('/mod', [PizzakController::class, 'ModData']);
