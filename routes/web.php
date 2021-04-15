<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CamareroController;
use App\Http\Controllers\CardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'login']);
Route::post('/validarlogin', [UserController::class, 'validarLogin']);
Route::get('cerrar_sesion', [UserController::class, 'cerrar_sesion']);
Route::get('/vista_camarero', [CamareroController::class, 'vista_camarero']);
Route::post('/ver_promociones', [CamareroController::class, 'ver_promociones']);
//vista cliente
Route::get('/viewCliente', [UserController::class, 'viewCliente']);
Route::get('/viewCamarero', [CamareroController::class, 'viewCamarero']);
Route::post('/ver_promociones', [CamareroController::class, 'ver_promociones']);
//vista cliente
Route::get('/viewCliente', [UserController::class, 'viewCliente']
);
//vista lista restaurante
Route::get('/viewListLocal', function (){ return view('viewListLocal');});
Route::get('/home', function (){ return view('home');});
//recoger tarjetas
Route::get('showCard', [CardController::class, 'showCard']);
Route::get('verLocales', [CardController::class, 'verLocales']);
Route::post('verCardLocal', [CardController::class, 'verCardLocal']);
Route::post('validarQR', [CardController::class, 'validarQR']);
