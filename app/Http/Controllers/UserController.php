<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login() {
        //redirige a la vista login si no has iniciado sesion.
        return view('login');
    }
}
