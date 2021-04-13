<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function showCard() {
        try {
            $id_user = session()->get('id_user');
            $tarjetas = DB::select('SELECT * FROM tbl_card
            INNER JOIN tbl_promotion
            ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion
            GROUP BY tbl_card.id_card
            HAVING tbl_card.id_user_fk = ? 
            AND tbl_promotion.status = "enable" AND tbl_card.status = "open";', [$id_user]);
            return response()->json($tarjetas, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }

    // VALIDACIÓN cuando un usuario LEE un QR
    public function validarQR() {
        // Comprovamos si la promoción existe en las tarjetas del usuario
        $promo = 'no';
        $sellos = "1";
        if($promo == 'si'){ // ? Existe tarjeta
            // Comprovamos el número de sellos de la tarjeta
            if ($sellos <= 'sellos maximos'){ // ? Sellos por debajo del máximo
                // Comprobar si el número de sellos es 1 menos al máximo
                if ($sellos == 'sellos maximos - 1 '){ // ? Sellos 1 por debajo del máximo (9/10)
                    // Mensage de tarjeta completada con exito
                    // Cambiar estado de la tarjeta a close
                } else { // ! Sellos sin llegar a los dos últimos (1-8)/10
                    // Mensaje de sello aplicado correctamente
                    // Añadimos un sello (+1)
                }
            } else { // ! Máximo de sellos (10/10)
                // Mensage de tarjeta al máximo de sellos
            }
        } else { // ! No existe tarjeta
            // Creamos una tarjeta para el usuario
            // Añadimos el primer sello
        }

    }
}
