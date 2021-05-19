<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectionController extends Controller
{
    public function cruds(){
        return view('viewAdm_homeCruds');
    }
    public function viewAdm_LocalesCruds(){
        return view('viewAdm_LocalesCruds');
    }
    public function viewAdm_GrupoCruds(){
        return view('viewAdm_GrupoCruds');
    }

    public function crudCompany(){
        return view('crudCompany');
    }

    public function crudLocales(){
        return view('crudLocales');
    }
    public function crudLocales_Grupo(){
        return view('crudLocales_Grupo');
    }

    public function crudPromociones(){
        return view('crudPromociones');
    }
    public function crudPromociones_Local(){
        return view('crudPromociones_Local');
    }
    public function crudPromociones_Grupo(){
        return view('crudPromociones_Grupo');
    }

    public function crudTarjetas(){
        return view('crudTarjetas');
    }
    public function crudTarjetas_Local(){
        return view('crudTarjetas_Local');
    }
    public function crudTarjetas_Grupo(){
        return view('crudTarjetas_Grupo');
    }

    public function crudUsuarios(){
        return view('crudUsuarios');
    }
    public function crudUsuarios_Local(){
        return view('crudUsuarios_Local');
    }
    public function crudUsuarios_Grupo(){
        return view('crudUsuarios_Grupo');
    }
}
