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

            $etiquetas = DB::select('SELECT DATE(create_date) AS fecha, COUNT(id_user) AS cantidad
            FROM tbl_user
            WHERE create_date BETWEEN NOW() - INTERVAL ? DAY AND NOW()
            GROUP BY DATE(create_date)',[$request['valueFilter']]);

            $etiquetas2 = DB::select('SELECT status_card AS estado, COUNT(id_card) AS tarjetas FROM tbl_card
            WHERE create_date BETWEEN NOW() - INTERVAL ? DAY AND NOW()
            GROUP BY status_card', [$request['valueFilter2']]);

            $etiquetas3 = DB::select('SELECT DATE(tbl_stamp.date) AS fecha, COUNT(id_stamp) AS Tcafes FROM tbl_stamp
            INNER JOIN	tbl_card
            ON tbl_stamp.id_card_fk = tbl_card.id_card
            INNER JOIN tbl_promotion
            ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion
                    WHERE tbl_stamp.date BETWEEN NOW() - INTERVAL ? DAY AND NOW()
                    GROUP BY DATE(tbl_stamp.date)', [$request['valueFilter3']]);

            return response()->json(array($etiquetas, $etiquetas2, $etiquetas3));

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()));
        }
    }
    public function sendDataEstablecimiento(Request $request) {
        try {

            $etiquetas = DB::select('SELECT DATE(create_date) AS fecha, COUNT(id_user) AS cantidad
            FROM tbl_user
            WHERE create_date BETWEEN NOW() - INTERVAL ? DAY AND NOW()
            GROUP BY DATE(create_date)',[$request['valueFilter']]);

            return response()->json($etiquetas);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()));
        }
    }
}


// $registros = DB::select('SELECT DATE_FORMAT(create_date, "%m/%d/%Y") AS registros
//             FROM tbl_user
//             WHERE create_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()');
