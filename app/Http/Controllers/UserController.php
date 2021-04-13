<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Swift;

class UserController extends Controller
{
    public function login() {
        //redirige a la vista login si no has iniciado sesion.
        return view('login');
    }

    public function vista_camarero(){
        return view('vista_camarero');
    }

    public function validarLogin(Request $request) {;
        // Recibimos los datos del formulario
        $datos = $request->except('_token','enviar');

        // Buscamos si existe un usuario registrado
        $user=DB::table('tbl_user')->where([
            ['email','=',$datos['email']],
            ['psswd','=',md5($datos['psswd'])]
        ])->count(); // Contamos el numero de registros(usuarios) en la BBDD
        // Si existe un usuario $user será igual a 1, si no existe será igual a 0

        if ($user == 1){ // ? Existe usuario
            // Recuperamos los datos del usuario de la BBDD
            $user = DB::table('tbl_user')->where('email','=',$datos['email'])->where('psswd','=',md5($datos['psswd']))->first();

            // echo "Tipo usuario: " . $user->id_typeuser_fk;
            // Iniciamos sesión del usuario (guardamos los datos necesarios: nombre y tipo de usuario)
            $request->session()->put('name', $user->name);
            $request->session()->put('typeuser', $user->id_typeuser_fk);
            $request->session()->put('id_user', $user->id_user);

            switch ($user->id_typeuser_fk) { // Comprovamos el tipo de usuario ( 1-5 )
                case '1':
                    return redirect('viewCliente');
                    break;
                case '2':
                    // echo "Camarero";
                    // return view('viewCamarero');
                    return redirect('vista_camarero');
                    break;
                case '3':
                    echo "ADM establecimiento";
                    break;
                case '4':
                    echo "ADM grupo";
                    break;
                case '5':
                    echo "ADM master";
                    break;
                default:
                    # code...
                    break;
            }
            // echo var_dump($user->id_typeuser_fk);
            // print_r($user);
            // Establecer sesion
            // return redirect('mostrar');
        } else { // ! No existe usuario
            $message = 'Ha habido un error al intentar entrar en su cuenta, por favor revise que el email y la contraseña esten bien escritos';
            // return redirect('/',compact('errores'));
            return redirect('/')->with('message',$message);
            // Redirect::to('login?errors='.$errores);
            // return redirect('/')->with('errors','Ha habido un error al intentar entrar en su cuenta, por favor revise que el email y la contraseña esten bien escritos');
            // return redirect('/')->with('errors','Datos mal introducidos. Revisa los campos.');
        }
    }
}
