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
            INNER JOIN tbl_images
            ON tbl_promotion.id_image_fk_promo = tbl_images.id_image
            GROUP BY tbl_card.id_card
            HAVING tbl_card.id_user_fk = ?
            AND tbl_promotion.status_promo = "enable"
            AND (tbl_promotion.unlimited = "Si" OR tbl_promotion.expiration > NOW())
            ORDER BY tbl_card.status ASC;', [$id_user]);
            return response()->json($tarjetas, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }
    
    public function validarQR(Request $request){
        $id_promo = $request->input('id_promo');
        $id_camarero = $request->input('id_camarero');
        $id_user = $request->session()->get('id_user');
        $datos = [$id_promo,$id_camarero,$id_user];
        //return response()->json($datos, 200);

        $promo = DB::table('tbl_promotion')
        ->join('tbl_card','tbl_promotion.id_promotion','=','tbl_card.id_promotion_fk')
        ->select('*')
        ->where([
            ['tbl_card.id_user_fk','=',$id_user],
            ['tbl_card.id_promotion_fk','=',$id_promo],
            ['tbl_card.status','=','open']
        ])->count(); // Devuelve 1 o 0

        $datosPromo = DB::table('tbl_promotion')
        ->select('*')
        ->where([
            ['tbl_promotion.id_promotion','=',$id_promo],
        ])->first();

        if ($datosPromo->unlimited == "Si") {
            //Puedo crear otra tarjeta en el caso de que ya tenga una completa
            if($promo == 1){ // ? Existe tarjeta
                $sellos = DB::table('tbl_promotion')
                ->join('tbl_card','tbl_promotion.id_promotion','=','tbl_card.id_promotion_fk')
                ->select('*')
                ->where([
                    ['tbl_card.id_user_fk','=',$id_user],
                    ['tbl_card.id_promotion_fk','=',$id_promo],
                    ['tbl_card.status','=','open']
                ])->first();
    
                // Total de sellos: $sellos->stamp_max
                // Sellos actuales: $sellos->stamp_now
    
                if ($sellos->stamp_now < $sellos->stamp_max) {
                    // return response()->json('Sellos por debajo del total', 200);
                    if ($sellos->stamp_now == ($sellos->stamp_max - 1)){ // ? Sellos 1 por debajo del máximo (9/10)
                        // echo "Falta 1 sello para el total (9/10)";
                        // Mensage de tarjeta completada con exito
                        // Añadimos un sello a la tbl_stam
                        DB::table('tbl_stamp')->insert(
                            ['date' => NOW(),
                            'id_card_fk' => $sellos->id_card, 
                            'id_user_fk_stamp' => $id_camarero] // Camarero que pone el sello
                        );
                        // Añadimos un sello a la tbl_card (stamp_now + 1)
                        // Hacemos un update y le añadimos un sello (sellos maximos)
                        DB::select('UPDATE `tbl_card` SET `stamp_now` = ? WHERE `tbl_card`.`id_card` = ?',[$sellos->stamp_max,$sellos->id_card]);
                        return response()->json('Promoción completada', 200);
                    } else { // ! Sellos sin llegar a los dos últimos (1-8)/10
                        // echo "No falta 1 sello para el total ((1-8)/10)";
                        // Mensaje de sello aplicado correctamente
                        // Añadimos un sello (+1)
                        DB::table('tbl_stamp')->insert(
                            ['date' => NOW(),
                            'id_card_fk' => $sellos->id_card, 
                            'id_user_fk_stamp' => $id_camarero] // Camarero que pone el sello
                        );
                        // Añadimos un sello a la tbl_card (stamp_now + 1)
                        // Hacemos un update y le añadimos un sello
                        DB::select('UPDATE `tbl_card` SET `stamp_now` = ? WHERE `tbl_card`.`id_card` = ?',[($sellos->stamp_now+1),$sellos->id_card]);
                        return response()->json('Sello canjeado correctamente', 200);
                    }
                } else {
                    return response()->json('La tarjeta de promoción esta completada', 200);
                }
    
                //return response()->json($sellos, 200);
            } else { // ! No existe tarjeta
                DB::table('tbl_card')->insert(
                    ['id_card' => NULL,
                    'stamp_now' => 1,
                    'color' => '#C70039',
                    'status' => 'open',
                    'id_promotion_fk' => $id_promo,
                    'id_user_fk' => $id_user]
                );
    
                // Ahora recuperamos el ID de la tarjeta que hemos creado (id_card)
                $promo = DB::table('tbl_promotion')
                ->join('tbl_card','tbl_promotion.id_promotion','=','tbl_card.id_promotion_fk')
                ->select('*')
                ->where([
                    ['tbl_card.id_user_fk','=',$id_user],
                    ['tbl_card.id_promotion_fk','=',$id_promo],
                    ['tbl_card.status','=','open']
                ])->first(); // $promo->id_card;
    
                // Añadimos el primer sello
                DB::table('tbl_stamp')->insert(
                    ['date' => NOW(),
                    'id_card_fk' => $promo->id_card, // ID de la tarjeta
                    'id_user_fk_stamp' => $id_camarero] // Camarero que pone el sello
                ); 
                
                return response()->json('Targeta creada correctamente', 200);
            }
        } elseif ($datosPromo->expiration >= date('d-m-Y')) {
            //Puedo crear la tarjeta, pero sola una vez
            $promoCheck = DB::table('tbl_promotion')
            ->join('tbl_card','tbl_promotion.id_promotion','=','tbl_card.id_promotion_fk')
            ->select('*')
            ->where([
                ['tbl_card.id_user_fk','=',$id_user],
                ['tbl_card.id_promotion_fk','=',$id_promo]
            ])->first(); // Datos

            if($promo == 1){ // ? Existe tarjeta
                $sellos = DB::table('tbl_promotion')
                ->join('tbl_card','tbl_promotion.id_promotion','=','tbl_card.id_promotion_fk')
                ->select('*')
                ->where([
                    ['tbl_card.id_user_fk','=',$id_user],
                    ['tbl_card.id_promotion_fk','=',$id_promo],
                    ['tbl_card.status','=','open']
                ])->first();
    
                // Total de sellos: $sellos->stamp_max
                // Sellos actuales: $sellos->stamp_now
    
                if ($sellos->stamp_now < $sellos->stamp_max) {
                    // return response()->json('Sellos por debajo del total', 200);
                    if ($sellos->stamp_now == ($sellos->stamp_max - 1)){ // ? Sellos 1 por debajo del máximo (9/10)
                        // echo "Falta 1 sello para el total (9/10)";
                        // Mensage de tarjeta completada con exito
                        // Añadimos un sello a la tbl_stam
                        DB::table('tbl_stamp')->insert(
                            ['date' => NOW(),
                            'id_card_fk' => $sellos->id_card, 
                            'id_user_fk_stamp' => $id_camarero] // Camarero que pone el sello
                        );
                        // Añadimos un sello a la tbl_card (stamp_now + 1)
                        // Hacemos un update y le añadimos un sello (sellos maximos)
                        DB::select('UPDATE `tbl_card` SET `stamp_now` = ? WHERE `tbl_card`.`id_card` = ?',[$sellos->stamp_max,$sellos->id_card]);
                        return response()->json('Promoción completada', 200);
                    } else { // ! Sellos sin llegar a los dos últimos (1-8)/10
                        // echo "No falta 1 sello para el total ((1-8)/10)";
                        // Mensaje de sello aplicado correctamente
                        // Añadimos un sello (+1)
                        DB::table('tbl_stamp')->insert(
                            ['date' => NOW(),
                            'id_card_fk' => $sellos->id_card, 
                            'id_user_fk_stamp' => $id_camarero] // Camarero que pone el sello
                        );
                        // Añadimos un sello a la tbl_card (stamp_now + 1)
                        // Hacemos un update y le añadimos un sello
                        DB::select('UPDATE `tbl_card` SET `stamp_now` = ? WHERE `tbl_card`.`id_card` = ?',[($sellos->stamp_now+1),$sellos->id_card]);
                        return response()->json('Sello canjeado correctamente', 200);
                    }
                } else {
                    return response()->json('La tarjeta de promoción esta completada', 200);
                }
    
                //return response()->json($sellos, 200);
            } elseif ($promoCheck->status == "close") { // ! Canjeada
                return response()->json('La tarjeta de promoción ya ha sido canjeada', 200);
            } else {
                DB::table('tbl_card')->insert(
                    ['id_card' => NULL,
                    'stamp_now' => 1,
                    'color' => '#C70039',
                    'status' => 'open',
                    'id_promotion_fk' => $id_promo,
                    'id_user_fk' => $id_user]
                );
    
                // Ahora recuperamos el ID de la tarjeta que hemos creado (id_card)
                $promo = DB::table('tbl_promotion')
                ->join('tbl_card','tbl_promotion.id_promotion','=','tbl_card.id_promotion_fk')
                ->select('*')
                ->where([
                    ['tbl_card.id_user_fk','=',$id_user],
                    ['tbl_card.id_promotion_fk','=',$id_promo],
                    ['tbl_card.status','=','open']
                ])->first(); // $promo->id_card;
    
                // Añadimos el primer sello
                DB::table('tbl_stamp')->insert(
                    ['date' => NOW(),
                    'id_card_fk' => $promo->id_card, // ID de la tarjeta
                    'id_user_fk_stamp' => $id_camarero] // Camarero que pone el sello
                ); 
                
                return response()->json('Targeta creada correctamente', 200);
            }
        } 
    }

    public function verLocales() {
        try { 
            $id_user = session()->get('id_user');
            $locales = DB::select('SELECT DISTINCT tbl_local.id_local, tbl_local.name, tbl_local.image FROM tbl_local
            INNER JOIN tbl_promotion
            ON tbl_local.id_local = tbl_promotion.id_local_fk
            INNER JOIN tbl_card
            ON tbl_promotion.id_promotion = tbl_card.id_promotion_fk
            AND (tbl_promotion.unlimited = "Si" OR tbl_promotion.expiration > NOW())
            WHERE tbl_card.id_user_fk = ? AND tbl_card.status = "open"', [$id_user]);
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
            HAVING tbl_card.id_user_fk = ? 
            AND tbl_promotion.status_promo = "enable" 
            AND (tbl_promotion.unlimited = "Si" OR tbl_promotion.expiration > NOW())
            AND tbl_card.status = "open" 
            AND tbl_local.id_local = ?;', [$id_user, $request->input('id_local')]);
            return response()->json($locales, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }

    public function image(){
        return view('image');
    }

    public function imgUp(Request $request){

        $request->validate(
            [
                'foto' => 'required'
            ]
        );

        $datosform = $request->except('_token','enviar');
        // return $datosform;

        $datosform['foto']=$request->file('foto')->store('uploads','public');

        DB::select('UPDATE `tbl_promotion` SET `image` = ? WHERE `tbl_promotion`.`id_promotion` = 1;', [ $datosform['foto']]);

        return redirect('image');
    }

    public function ver_tarjetas(Request $request){
        $usuarios = DB::select('SELECT tbl_card.*,tbl_promotion.name_promo,tbl_user.email,tbl_images.* FROM tbl_card
        INNER JOIN tbl_promotion
        ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion
        INNER JOIN tbl_user
        ON tbl_card.id_user_fk = tbl_user.id_user
        INNER JOIN tbl_images
        ON tbl_promotion.id_image_fk_promo = tbl_images.id_image
        WHERE `stamp_now` LIKE ? AND tbl_card.`status` LIKE ? AND name_promo LIKE ? AND `email`LIKE ?
        GROUP BY tbl_card.id_card',
        ['%'.$request['sellos'],
        '%'.$request['status'].'%',
        '%'.$request['promo'].'%',
        '%'.$request['email'].'%'
        ]); // Buscamos los que acaben con el numero filtrado
        // Esto nos permite si por ejemplo buscamos 1 que salgan los sellos que terminan en 1
        // Y no todos los sellos que contienen un 1
        return response()->json($usuarios,200);
    }

    public function ver_locales_t(){
        $locales = DB::select('SELECT * FROM `tbl_local`');
        return response()->json($locales,200);
    }
    public function ver_promos_t(Request $request){
        // $promos = DB::select('SELECT * FROM `tbl_promotion`');
        $promos = DB::select('SELECT * FROM `tbl_promotion` WHERE `id_local_fk`=?',[$request['id_local']]);
        return response()->json($promos,200);
    }
    public function registrar_tarjeta(Request $request){
        $id_user = session()->get('id_user');
        $user = DB::select('SELECT * FROM `tbl_user` WHERE `email`=?',[$request['email']]);
        if (empty($user)){
            return response()->json('NOK. El email no existe',200);
        } else {
            DB::select('INSERT INTO `tbl_card` (`stamp_now`, `color`, `status`, 
            `create_date`, `complete_date_card`, `status_card`, `id_promotion_fk`, `id_user_fk`) 
            VALUES (?,?,?,?,?,?,?,?)',[
                1, '#C70039', 'open', NOW(), NULL, 'Activado', $request['promo'], $user[0]->id_user
            ]);

            $id = DB::select('SELECT MAX(id_card) AS id_card FROM tbl_card'); // $id[0]->id_card
            DB::table('tbl_stamp')->insert(
                ['date' => NOW(),
                'id_card_fk' => $id[0]->id_card, 
                'id_user_fk_stamp' => $id_user] // Camarero que pone el sello
            );

            return response()->json('Ok. Tarjeta creada correctamente',200);
        }
        //$alex = $user['num'];
        //print_r($user);
        // return response()->json($user,200);
    }

    public function eliminar_tarjeta(Request $request){
        $id_card = $request['id_tarjeta'];

        DB::select('DELETE FROM tbl_stamp WHERE id_card_fk = ?',[$id_card]);
        DB::select('DELETE FROM tbl_card WHERE id_card = ?',[$id_card]);

        return response()->json('OK. Tarjeta eliminada correctamente',200);
    }
    public function cambiar_estado_t(Request $request){
        if ($request['status'] == 1){
            DB::select('UPDATE tbl_card SET `status`=? WHERE `id_card`=?', 
            ['close',$request['id_card']]);
            return response()->json('OK. Tarjeta cerrada correctamente',200);
        } else {
            DB::select('UPDATE tbl_card SET `status`=? WHERE `id_card`=?', 
            ['open',$request['id_card']]);
            return response()->json('OK. Tarjeta abierta correctamente',200);
        }
    }
    public function ver_card(Request $request){
        $id_card = $request['id_card'];
        $card = DB::select('SELECT tbl_card.*,tbl_user.email,tbl_promotion.* FROM tbl_card 
        INNER JOIN tbl_user ON tbl_card.id_user_fk = tbl_user.id_user
        INNER JOIN tbl_promotion ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion 
        WHERE id_card = ?',[$id_card]);
        return response()->json($card,200);
    }
}
