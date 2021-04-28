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
// Route::group(['prefix' => 'auth'], function () {
//     Route::get('/{provider}', 'UserController@redirectToProvider');
//     Route::get('/{provider}/callback', 'UserController@handleProviderCallback');
// });
Route::get('/google', [UserController::class, 'redirectToProvider']);
Route::get('/google/callback', [UserController::class, 'handleProviderCallback']);
Route::post('/registrar', [UserController::class, 'registrar']);
Route::get('/', [UserController::class, 'login']);
Route::post('/validarlogin', [UserController::class, 'validarLogin']);
Route::get('cerrar_sesion', [UserController::class, 'cerrar_sesion']);
Route::get('/vista_camarero', [CamareroController::class, 'vista_camarero']);
Route::post('/ver_promociones', [CamareroController::class, 'ver_promociones']);
//vista cliente
Route::get('/viewCliente', [UserController::class, 'viewCliente']);
Route::get('/viewCamarero', [CamareroController::class, 'viewCamarero']);
Route::post('/ver_promociones', [CamareroController::class, 'ver_promociones']);

//vista lista restaurante
Route::get('/viewListLocal', function (){ return view('viewListLocal');});
Route::get('/home', function (){ return view('home');});
Route::get('/registro', function (){ return view('registro');});
//recoger tarjetas
Route::get('showCard', [CardController::class, 'showCard']);
Route::get('verLocales', [CardController::class, 'verLocales']);
Route::post('verCardLocal', [CardController::class, 'verCardLocal']);
Route::post('/validarQR', [CardController::class, 'validarQR']);

Route::post('/validarQRcamarero', [CamareroController::class, 'validarQRcamarero']); 

//para subir imagenes
Route::get('image',  [CardController::class, 'image']);
Route::post('imgUp', [CardController::class, 'imgUp']);

//Vista admin master
Route::get('/viewMaster', [UserController::class, 'viewMaster']);
Route::get('/cruds', function() {
    return view('viewAdm_homeCruds');
});
Route::get('/crudUsuarios', function() {
    return view('crudUsers');
});
