<?php

namespace App\Http\Controllers;

use App\Models\graficas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GraficasController extends Controller
{
    public function sendData(Request $request) {
        try {
            $etiquetas = DB::select('SELECT DATE_FORMAT(create_date, "%m/%d/%Y") AS registros
            FROM tbl_user 
            WHERE create_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()');;
            $datosClientesAlta = [500, 50, 242, 1404];
            return response()->json( array($etiquetas, $datosClientesAlta));
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()));
        }
    }
}


$registros = DB::select('SELECT DATE_FORMAT(create_date, "%m/%d/%Y") AS registros
            FROM tbl_user 
            WHERE create_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()');