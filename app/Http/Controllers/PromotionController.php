<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    public function ver_promos(Request $request){
        $promos = DB::select('SELECT tbl_promotion.*, tbl_local.name, tbl_user.email FROM tbl_promotion 
        INNER JOIN tbl_local ON tbl_promotion.id_local_fk = tbl_local.id_local
        INNER JOIN tbl_user ON tbl_promotion.id_user_fk_promo = tbl_user.id_user
        WHERE stamp_max LIKE ? AND reward LIKE ? AND name_promo LIKE ? 
        AND `unlimited` LIKE ? AND tbl_local.name like ? AND tbl_user.email LIKE ?
        AND status_promo LIKE ? GROUP BY tbl_promotion.id_promotion', //AND expiration LIKE ?
        ['%'.$request['sellos'],
        '%'.$request['premio'].'%',
        '%'.$request['nombre'].'%',
        //'%'.$request['fecha'].'%',
        '%'.$request['ilimitada'].'%',
        '%'.$request['local'].'%',
        '%'.$request['email'].'%',
        '%'.$request['status'].'%' ]); 
        return response()->json($promos,200);
    }
    public function eliminar_promo(Request $request){
        $id_promo = $request['id_promo'];
        // Si hay usuarios que tienen esta tarjeta hemos de elimar el usuario
        $cards = DB::select('SELECT id_card FROM tbl_card WHERE id_promotion_fk = ?',[$id_promo]);
        foreach ($cards as $card) {
            DB::select('DELETE FROM tbl_stamp WHERE id_card_fk = ?',[$card->id_card]);
            DB::select('DELETE FROM tbl_card WHERE id_card = ?',[$card->id_card]);
        }
        // 
        DB::select('DELETE FROM tbl_promotion WHERE id_promotion = ?',[$id_promo]);

        return response()->json('OK. Promocion eliminada correctamente',200);
    }
    public function cambiar_estado_p(Request $request){
        if ($request['status'] == 1){
            DB::select('UPDATE tbl_promotion SET `status_promo`=? WHERE `id_promotion`=?', 
            ['disable',$request['id_promo']]);
            return response()->json('OK. Promocion deshabilitada correctamente',200);
        } else {
            DB::select('UPDATE tbl_promotion SET `status_promo`=? WHERE `id_promotion`=?', 
            ['enable',$request['id_promo']]);
            return response()->json('OK. Promocion activada correctamente',200);
        } 

        
    }
    public function ver_locales_p(){
        $locales = DB::select('SELECT * FROM `tbl_local`');
        return response()->json($locales,200);
    }
    public function registrar_promo(Request $request){
        $id_user = session()->get('id_user');
        DB::select('INSERT INTO `tbl_promotion` (`stamp_max`, `id_image_fk_promo`, 
        `reward`, `name_promo`, `status_promo`, `expiration`, `unlimited`, `create_date_promo`, 
        `close_data_promo`, `id_local_fk`, `id_user_fk_promo`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)' , [
            $request['sellos'],1,$request['premio'],$request['nombre'],
            'enable', null, 'Si', null, null, $request['restaurante'],$id_user
        ]);

        return response()->json('OK. Promoción creada correctamente',200);
    }
    public function ver_promo(Request $request){
        $id_promo = $request['id_promo'];
        $card = DB::select('SELECT tbl_promotion.*,tbl_user.email FROM tbl_promotion 
        INNER JOIN tbl_user ON tbl_promotion.id_user_fk_promo = tbl_user.id_user
        WHERE id_promotion = ?',[$id_promo]);
        return response()->json($card,200);
    }
}
