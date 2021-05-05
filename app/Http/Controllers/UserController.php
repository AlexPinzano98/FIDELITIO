<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Mockery\Undefined;
use Swift;

class UserController extends Controller
{
    public function login() {
        //redirige a la vista login si no has iniciado sesion.
        return view('login');
    }
    public function redirectToProvider2()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback2()
    {
        $user = Socialite::driver('facebook')->user();
        //return $user->getEmail();
        $email= $user->getEmail();
        $name= $user->getName();
        $consentimiento=1;
        $contador1=DB::table('tbl_user')->where([
            ['email','=',$email],
            ['google/facebook','=','1']
        ])->count();
        $contador2=DB::table('tbl_user')->where([
            ['email','=',$email],
            ['google/facebook','=','0']
        ])->count();
        if($contador1==1){
            //hare login ya que tengo cuenta con google o facebook
            $user = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $user->name);
            session()->put('typeuser', '1');
            session()->put('id_user', $user->id_user);
            return redirect('viewCliente');
        }elseif($contador2==1){
            $user = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $user->name);
            session()->put('typeuser', '1');
            session()->put('id_user', $user->id_user);
            return redirect('viewCliente');
        }else{
            //registrarse con la cuenta y hacer login
            DB::table('tbl_user')->insertGetId(['name'=>$user->getName(),'confidentiality'=>$consentimiento,'email'=>$user->getEmail(),'psswd'=>md5('1234'),'id_typeuser_fk'=>'1','google/facebook'=>'1']);
            $user = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $name);
            session()->put('typeuser', '1');
            session()->put('id_user', $user->id_user);
            return redirect('viewCliente');
        }
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback(){
        //return Socialite::driver('google')->redirect();
        $user = Socialite::driver('google')->user();
        $email= $user->getEmail();
        $name= $user->getName();
        $consentimiento=1;
        $contador1=DB::table('tbl_user')->where([
            ['email','=',$email],
            ['google/facebook','=','1']
        ])->count();
        $contador2=DB::table('tbl_user')->where([
            ['email','=',$email],
            ['google/facebook','=','0']
        ])->count();
        if($contador1==1){
            //hare login ya que tengo cuenta con google o facebook
            $user = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $user->name);
            session()->put('typeuser', '1');
            session()->put('id_user', $user->id_user);
            return redirect('viewCliente');
        }elseif($contador2==1){
            $user = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $user->name);
            session()->put('typeuser', '1');
            session()->put('id_user', $user->id_user);
            return redirect('viewCliente');
        }else{
            //registrarse con la cuenta y hacer login
            DB::table('tbl_user')->insertGetId(['name'=>$user->getName(),'confidentiality'=>$consentimiento,'email'=>$user->getEmail(),'psswd'=>md5('1234'),'id_typeuser_fk'=>'1','google/facebook'=>'1']);
            $user = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $name);
            session()->put('typeuser', '1');
            session()->put('id_user', $user->id_user);
            return redirect('viewCliente');
        }
        //return $user->getEmail();
    }

    public function cerrar_sesion(){
        session()->forget(['id_user']);
        return redirect('/');
    }


    public function validarLogin(Request $request){
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
                    return redirect('viewCamarero');
                    break;
                case '3':
                    echo "ADM establecimiento";
                    break;
                case '4':
                    echo "ADM grupo";
                    break;
                case '5':
                    //echo "ADM master";
                    return redirect('viewMaster');
                    break;
                default:
                    # code...
                    break;
            }
        } else { // ! No existe usuario
            $message = 'Ha habido un error, por favor revise que el email y la contraseña estén bien escritos';
            return redirect('/')->with('message',$message);
        }
    }


    public function viewCliente(){
        if (!(session()->has('id_user'))) {
            return redirect('/');
        } else {
            return view('viewCliente');
        }
    }

    public function registrar(Request $request){
        $datos = $request->except('_token','submit');
        if(isset($datos['consentimiento'])){
            $consentimiento=0;
        }else{
            $consentimiento=1;
        }
        $users=DB::table('tbl_user')->where([['email','=',$datos['email']]])->count();
        if ($users == 0){
            DB::table('tbl_user')->insertGetId(['name'=>$datos['nombre'],'lastname'=>$datos['apellidos'],'gender'=>$datos['sexo'],'confidentiality'=>$consentimiento,'email'=>$datos['email'],'psswd'=>md5($datos['psswd']),'id_typeuser_fk'=>'1']);
            $mensaje = 'Tu cuenta se ha creado correctamente';
            return redirect('/')->with('mensaje',$mensaje);
        }else{
            $mensaje="El correo introducido ya esta registrado";
            return redirect('registro')->with('mensaje',$mensaje);
        }
    }

    public function viewMaster(){
        if (!(session()->has('id_user'))) {
            return redirect('/');
        } else {
            return view('viewAdm_master');
        }
    }
}
