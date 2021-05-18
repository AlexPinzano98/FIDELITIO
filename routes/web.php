<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CamareroController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\GraficasController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CompanyController;

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
Route::get('/perfilU', [UserController::class, 'perfilU']);
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

//Vista admin establecimiento
Route::get('/viewEstablecimiento', [UserController::class, 'viewEstablecimiento']);
//Vista admin establecimiento
Route::get('/viewGrupo', [UserController::class, 'viewGrupo']);
//Vista admin master
Route::get('/viewMaster', [UserController::class, 'viewMaster']);

Route::get('/cruds_master', function() {
    if (session('typeuser') != 5) {
        return redirect('/');
    } else {
        return view('viewAdm_homeCruds');
    }
});
Route::get('/cruds_local', function() {
    if (session('typeuser') != 3) {
        return redirect('/');
    } else {
        return view('viewAdm_establecimiento');
    }
});
Route::get('/crudUsuarios', function() {
    if (session('typeuser') != 5) {
        return redirect('/');
    } else {
        return view('crudUsers');
    }
});

// URL::forceScheme('https');
//Prueba envio datos graficas

Route::post('sendData', [GraficasController::class, 'sendData']);
Route::post('sendDataEstablecimiento', [GraficasController::class, 'sendDataEstablecimiento']);
Route::post('sendDataGrupo', [GraficasController::class, 'sendDataGrupo']);
Route::get('/cruds', [DirectionController::class, 'cruds']);
//Redirecciones a los diferentes tipos de CRUD (admin master)
Route::get('/crudCompany', [DirectionController::class, 'crudCompany']);
Route::get('/crudLocales', [DirectionController::class, 'crudLocales']);
Route::get('/crudPromociones', [DirectionController::class, 'crudPromociones']);
Route::get('/crudTarjetas', [DirectionController::class, 'crudTarjetas']);
Route::get('/crudUsuarios', [DirectionController::class, 'crudUsuarios']);

// ADMIN MASTER
// CRUD USUARIOS
Route::post('/ver_usuarios', [UserController::class, 'ver_usuarios']);
Route::post('/ver_usuario', [UserController::class, 'ver_usuario']);
Route::post('/eliminar_usuario', [UserController::class, 'eliminar_usuario']);
Route::post('/registrar_usuario', [UserController::class, 'registrar_usuario']);
Route::post('/actualizar_usuario', [UserController::class, 'actualizar_usuario']);
Route::post('/cambiar_estado', [UserController::class, 'cambiar_estado']);
Route::get('/sendSessionId', [UserController::class, 'sendSessionId']);
Route::post('/ver_locales_u', [UserController::class, 'ver_locales_u']);
// CRUD TARJETAS
Route::post('/ver_tarjetas', [CardController::class, 'ver_tarjetas']);
Route::post('/ver_locales_t', [CardController::class, 'ver_locales_t']);
Route::post('/ver_promos_t', [CardController::class, 'ver_promos_t']);
Route::post('/registrar_tarjeta', [CardController::class, 'registrar_tarjeta']);
Route::post('/eliminar_tarjeta', [CardController::class, 'eliminar_tarjeta']);
Route::post('/cambiar_estado_t', [CardController::class, 'cambiar_estado_t']);
Route::post('/ver_card', [CardController::class, 'ver_card']);
// CRUD PROMOCIONES
Route::post('/ver_promos', [PromotionController::class, 'ver_promos']);
Route::post('/eliminar_promo', [PromotionController::class, 'eliminar_promo']);
Route::post('/cambiar_estado_p', [PromotionController::class, 'cambiar_estado_p']);
Route::post('/ver_locales_p', [PromotionController::class, 'ver_locales_p']);
Route::post('/registrar_promo', [PromotionController::class, 'registrar_promo']);
Route::post('/ver_promo', [PromotionController::class, 'ver_promo']);
// CRUD LOCALES
Route::post('/ver_locales', [LocalController::class, 'ver_locales']);
Route::post('/registrar_local', [LocalController::class, 'registrar_local']);
Route::post('/eliminar_local', [LocalController::class, 'eliminar_local']);
Route::post('/ver_companys_l', [LocalController::class, 'ver_companys_l']);
Route::post('/ver_grupos_l', [LocalController::class, 'ver_grupos_l']);
Route::post('/ver_local', [LocalController::class, 'ver_local']);
Route::post('/actualizar_local', [LocalController::class, 'actualizar_local']);
// CRUD COMPAÑIA
Route::post('/ver_companys', [CompanyController::class, 'ver_companys']);
Route::post('/registrar_company', [CompanyController::class, 'registrar_company']);
Route::post('/eliminar_company', [CompanyController::class, 'eliminar_company']);

// ADMIN ESTABLECIMIENTO (GERENTE)
// CRUD USUARIOS
// CRUD TARJETAS
// CRUD PROMOCIONES

//recuperar contraseña
Route::post('/password_reset', [UserController::class, 'password_reset']);
Route::post('/cambiar_password', [UserController::class, 'cambiar_password']);
Route::get('/contra_olvidada', function (){ return view('contra_olvidada');});
Route::post('/restaurar_pass', [UserController::class, 'restaurar_pass']);
