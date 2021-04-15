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
            INNER JOIN tbl_local
            ON tbl_promotion.id_local_fk = tbl_local.id_local
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
    public function validarQR(Request $request) {
        // echo "VALIDACIÓN DEL QR <br>";


        $id_promo = $request->input('id_promo');
        //echo $id_promo;

        return response()->json($id_promo, 200);


        //return false;
        // Comprovamos si la promoción existe en las tarjetas del usuario
        // Es decir si el usuario tiene promoción
        // Si devuelve 1 existe tarjeta, si devuelve 0 no existe
        $promo = DB::table('tbl_promotion')
        ->join('tbl_card','tbl_promotion.id_promotion','=','tbl_card.id_promotion_fk')
        ->select('*')
        ->where([
            ['tbl_card.id_user_fk','=','1'],
            ['tbl_card.id_promotion_fk','=','1']
        ])
        ->count(); // Devuelve 1 o 0

        echo "Usuario id: 1 , Promocion id: 1 . <br>";
        echo $promo;

        if($promo == 1){ // ? Existe tarjeta
            echo ". Existe promoción <br>";
            // Comprovamos el número de sellos de la tarjeta
            $sellos = DB::table('tbl_promotion')
            ->join('tbl_card','tbl_promotion.id_promotion','=','tbl_card.id_promotion_fk')
            ->select('*')
            ->where([
                ['tbl_card.id_user_fk','=','1'],
                ['tbl_card.id_promotion_fk','=','1'],
                ['tbl_card.status','=','open']
            ])->first();

            print_r($sellos);
            echo '<br>';
            echo "Maximo de sellos: " . $sellos->stamp_max . "<br>";
            echo "Minimo de sellos: " . $sellos->stamp_now . "<br>";

            if ($sellos->stamp_now <= $sellos->stamp_max){ // ? Sellos por debajo del máximo
                echo "Sellos por debajo del máximo <br>";
                // Comprobar si el número de sellos es 1 menos al máximo
                if ($sellos->stamp_now == ($sellos->stamp_max - 1)){ // ? Sellos 1 por debajo del máximo (9/10)
                    echo "Falta 1 sello para el total (9/10)";
                    // Mensage de tarjeta completada con exito
                    // Añadimos un sello (+1)
                    DB::table('tbl_stamp')->insert(
                        ['date' => NOW(),
                        'id_card_fk' => 3,
                        'id_user_fk_stamp' => 2]
                    );
                } else { // ! Sellos sin llegar a los dos últimos (1-8)/10
                    echo "No falta 1 sello para el total ((1-8)/10)";
                    // Mensaje de sello aplicado correctamente
                    // Añadimos un sello (+1)
                    DB::table('tbl_stamp')->insert(
                        ['date' => NOW(),
                        'id_card_fk' => 3,
                        'id_user_fk_stamp' => 2]
                    );
                }
            } else { // ! Máximo de sellos (10/10)
                // Mensage de tarjeta al máximo de sellos
                echo "Sellos máximos 10/10";
            }
        } else { // ! No existe tarjeta
            echo "No existe tarjeta de la promoción <br>";
            // Creamos una tarjeta para el usuario
            DB::table('tbl_card')->insert(
                ['id_card' => NULL,
                'stamp_now' => 1,
                'color' => '#C70039',
                'status' => 'open',
                'id_promotion_fk' => 1,
                'id_user_fk' => 6]
            );

            // Ahora recuperamos el ID de la tarjeta que hemos creado (id_card)
            $promo = DB::table('tbl_promotion')
            ->join('tbl_card','tbl_promotion.id_promotion','=','tbl_card.id_promotion_fk')
            ->select('*')
            ->where([
                ['tbl_card.id_user_fk','=','1'],
                ['tbl_card.id_promotion_fk','=','1'],
                ['tbl_card.status','=','open']
            ])->first(); // $promo->id_card;

            // Añadimos el primer sello
            DB::table('tbl_stamp')->insert(
                ['date' => NOW(),
                'id_card_fk' => 3, // ID de la tarjeta
                'id_user_fk_stamp' => 2] // Usuario que tendrá la tarjeta
            );
        }

    }

    public function verLocales() {
        try {
            $id_user = session()->get('id_user');
            $locales = DB::select('SELECT * FROM tbl_local
            INNER JOIN tbl_promotion
            ON tbl_local.id_local = tbl_promotion.id_local_fk
            INNER JOIN tbl_card
            ON tbl_promotion.id_promotion = tbl_card.id_promotion_fk
            GROUP BY tbl_local.id_local
            HAVING tbl_card.id_user_fk = ?', [$id_user]);
            return response()->json($locales, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }

    public function verCardLocal(Request $request) {
        try {
            $id_user = session()->get('id_user');
            $locales = DB::select('SELECT * FROM tbl_card
            INNER JOIN tbl_promotion
            ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion
            INNER JOIN tbl_local
            ON tbl_promotion.id_local_fk = tbl_local.id_local
            GROUP BY tbl_card.id_card
            HAVING tbl_card.id_user_fk = ? AND tbl_promotion.status = "enable" AND tbl_card.status = "open" AND tbl_local.id_local = ?;', [$id_user, $request->input('id_local')]);
            return response()->json($locales, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }
}
