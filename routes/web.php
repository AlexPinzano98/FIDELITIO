<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CamareroController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\GraficasController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\PromotionController;

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
Route::get('/facebook', [UserController::class, 'redirectToProvider2']);
Route::get('/facebook/callback', [UserController::class, 'handleProviderCallback2']);
Route::post('/registrar', [UserController::class, 'registrar']);
Route::get('/', [UserController::class, 'login']);
Route::post('/validarlogin', [UserController::class, 'validarLogin']);
Route::get('cerrar_sesion', [UserController::class, 'cerrar_sesion']);
Route::get('/vista_camarero', [CamareroController::class, 'vista_camarero']);
Route::post('/ver_promociones', [CamareroController::class, 'ver_promociones']);
Route::get('/perfil', [UserController::class, 'perfil']);
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

// URL::forceScheme('https');
//Prueba envio datos graficas

Route::post('sendData', [GraficasController::class, 'sendData']);
Route::get('/cruds', [DirectionController::class, 'cruds']);
//Redirecciones a los diferentes tipos de CRUD (admin master)
Route::get('/crudCompany', [DirectionController::class, 'crudCompany']);
Route::get('/crudLocales', [DirectionController::class, 'crudLocales']);
Route::get('/crudPromociones', [DirectionController::class, 'crudPromociones']);
Route::get('/crudTarjetas', [DirectionController::class, 'crudTarjetas']);
Route::get('/crudUsuarios', [DirectionController::class, 'crudUsuarios']);

//CRUD USUARIOS
Route::post('/ver_usuarios', [UserController::class, 'ver_usuarios']);
Route::get('/ver_usuarios', [UserController::class, 'ver_usuarios']);
Route::post('/ver_usuario', [UserController::class, 'ver_usuario']);
Route::post('/eliminar_usuario', [UserController::class, 'eliminar_usuario']);
Route::post('/registrar_usuario', [UserController::class, 'registrar_usuario']);
Route::post('/actualizar_usuario', [UserController::class, 'actualizar_usuario']);
Route::post('/cambiar_estado', [UserController::class, 'cambiar_estado']);

// CRUD TARJETAS
Route::post('/ver_tarjetas', [CardController::class, 'ver_tarjetas']);
Route::post('/ver_locales_t', [CardController::class, 'ver_locales_t']);
Route::post('/ver_promos_t', [CardController::class, 'ver_promos_t']);
Route::post('/registrar_tarjeta', [CardController::class, 'registrar_tarjeta']);
// CRUD PROMOCIONES
//Route::post('/ver_promociones', [PromotionController::class, 'ver_promociones']);
// CRUD LOCALES
Route::post('/ver_locales', [LocalController::class, 'ver_locales']);
// CRUD COMPAÑIA
Route::post('/ver_companyias', [CompanyController::class, 'ver_companyias']);

//recuperar contraseña
Route::post('/password_reset', [UserController::class, 'password_reset']);
Route::post('/cambiar_password', [UserController::class, 'cambiar_password']);
//Route::get('/mail_registro', function (){ return view('mail_registro');});
