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
        if (!(session()->has('id_user'))) {
            return redirect('/');
        } else {
            return view('viewCamarero');
        }
    }
    public function ver_promociones(Request $request)
    {
        try {
            $id_user = session()->get('id_user');
            $conseguir_id=DB::select('select * from tbl_user where id_user=?',[$id_user]);
            foreach ($conseguir_id as $id) {
                $id_local=$id->id_local_fk;
            }
            $promociones=DB::select('select * from tbl_promotion where id_local_fk=?',[$id_local]);
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
        return response()->json('Promoción canjeada con éxito', 200);
    }

}
