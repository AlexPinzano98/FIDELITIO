<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectionController extends Controller
{
    public function cruds(){
        if (session('typeuser') != 5 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('viewAdm_homeCruds');
        }
    }
    public function viewAdm_LocalesCruds(){
        if (session('typeuser') != 3 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('viewAdm_LocalesCruds');
        }
    }
    public function viewAdm_GrupoCruds(){
        if (session('typeuser') != 4 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('viewAdm_GrupoCruds');
        }
    }

    public function crudCompany(){
        if (session('typeuser') != 5 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudCompany');
        }
    }

    public function crudLocales(){
        if (session('typeuser') != 5 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudLocales');
        }
    }

    public function crudPromociones(){
        if (session('typeuser') != 5 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudPromociones');
        }
    }

    public function crudTarjetas(){
        if (session('typeuser') != 5 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudTarjetas');
        }
    }

    public function crudUsuarios(){
        if (session('typeuser') != 5 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudUsuarios');
        }
    }

    public function crudLocales_Grupo(){
        if (session('typeuser') != 4 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudLocales_Grupo');
        }
    }

    public function crudPromociones_Grupo(){
        if (session('typeuser') != 4 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudPromociones_Grupo');
        }
    }

    public function crudTarjetas_Grupo(){
        if (session('typeuser') != 4 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudTarjetas_Grupo');
        }
    }

    public function crudUsuarios_Grupo(){
        if (session('typeuser') != 4 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudUsuarios_Grupo');
        }
    }

    public function crudPromociones_Local(){
        if (session('typeuser') != 3 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudPromociones_Local');
        }
    }


    public function crudTarjetas_Local(){
        if (session('typeuser') != 3 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudTarjetas_Local');
        }
    }


    public function crudUsuarios_Local(){
        if (session('typeuser') != 3 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('crudUsuarios_Local');
        }
    }

}
