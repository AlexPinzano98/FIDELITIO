<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CamareroController;


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
<<<<<<< HEAD
Route::get('/camarero', [CamareroController::class, 'camarero']);
Route::post('/ver_promociones', [CamareroController::class, 'ver_promociones']);

//viewCliente vista
Route::get('viewCliente',function () { return view('viewCliente');});

=======
Route::post('/validarlogin', [UserController::class, 'validarLogin']);
Route::get('/vista_camarero', [CamareroController::class, 'vista_camarero']);
Route::post('/ver_promociones', [CamareroController::class, 'ver_promociones']);
>>>>>>> c419e798a4555060d632e5406d229046b8307699
