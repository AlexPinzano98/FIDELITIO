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

    public function crudCompany(){
        return view('crudCompany');
    }

    public function crudLocales(){
        return view('crudLocales');
    }

    public function crudPromociones(){
        return view('crudPromociones');
    }

    public function crudTarjetas(){
        return view('crudTarjetas');
    }

    public function crudUsuarios(){
        return view('crudUsuarios');
    }
}
