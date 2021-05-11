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
            $etiquetas = ["pr1", "pr2", "pr3", "pr4"];
            $datosClientesAlta = [500, 50, 242, 1404];
            return response()->json( array($etiquetas, $datosClientesAlta));
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()));
        }
    }
}
