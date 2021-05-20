<?php

namespace App\Http\Controllers;

use App\Models\Camarero;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CamareroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCamarero(){
        if (session('typeuser') != 2 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('viewCamarero');
        }
    }
    public function ver_promociones(Request $request)
    {
        try {
            $id_user = session()->get('id_user');
            //Conseguir id del local al que pertenece el camarero
            $conseguir_id=DB::select('SELECT * FROM tbl_user WHERE id_user=?',[$id_user]);

            foreach ($conseguir_id as $id) {
                $id_local=$id->id_local_fk;
            }
            //Buscamos las promociones del restaurante que sean ilimitadas o con fecha de caducidad inferior a la fecha actual
            $promociones=DB::select('SELECT * FROM tbl_promotion WHERE id_local_fk = ? AND status_promo = "enable" AND (tbl_promotion.unlimited = "Si" OR tbl_promotion.expiration > NOW())',[$id_local]);
            $datos=array($promociones, $conseguir_id);
            return response()->json($datos,200);
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }

    // Validación cuando un camarero lee un QR
    public function validarQRcamarero(Request $request){
        $id_card = $request->input('id_card'); // 4
        //$id_usuari = $request->input('id_camarero'); // 6
        $id_user_logged = $request->session()->get('id_user');

        // echo "VALIDACIÓN DEL QR <br>";

        //return response()->json($id_usuari, 200);

        // Recibimos los datos del QR

        // Buscamos el id_card de la tbl_card
        // Hacemos un update para cerrar la tarjeta

        DB::select('UPDATE `tbl_card` SET `status` = ? WHERE `tbl_card`.`id_card` = ? ',['close',$id_card]);
        DB::select('UPDATE `tbl_card` SET `status_card` = "Canjeado" WHERE `tbl_card`.`id_card` = ?',[$id_card]);
        DB::select('UPDATE `tbl_card` SET `complete_date_card` = NOW() WHERE `tbl_card`.`id_card` = ?',[$id_card]);
        
        return response()->json('Promoción canjeada con éxito', 200);
    }

}
