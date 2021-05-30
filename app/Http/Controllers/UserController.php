<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Mockery\Undefined;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmergencyCallReceived;
use App\Mail\MailBienvenida;
use App\Mail\RestaurarContra;
use Illuminate\Support\Str;
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
    public function handleProviderCallback2(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        //return $user->getEmail();
        $email= $user->getEmail();
        $name= $user->getName();
        $cadena = $name;
        $separador = " ";
        $separada = explode($separador, $cadena);
        $name=$separada[0];
        if(empty($separada[2])){
            $lastname=$separada[1];
        }else{
            $lastname=$separada[1].' '.$separada[2];
        }
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
            $usario = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $usario->name);
            session()->put('lastname', $usario->lastname);
            // session()->put('typeuser', '1');
            session()->put('typeuser', $usario->id_typeuser_fk);
            session()->put('id_user', $usario->id_user);
            switch ($usario->id_typeuser_fk) { // Comprovamos el tipo de usuario ( 1-5 )
                case '1':
                    return redirect('viewCliente');
                    break;
                case '2':
                    // echo "Camarero";
                    // return view('viewCamarero');
                    return redirect('viewCamarero');
                    break;
                case '3':
                    // echo "ADM establecimiento";
                    return redirect('viewAdm_LocalesCruds');
                    break;
                case '4':
                    // echo "ADM grupo";
                    return redirect('viewAdm_GrupoCruds');
                    break;
                case '5':
                    //echo "ADM master";
                    return redirect('cruds');
                    break;
                default:
                    # code...
                    break;
            }
        }elseif($contador2==1){
            $usario = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $usario->name);
            // session()->put('typeuser', '1');
            session()->put('typeuser', $usario->id_typeuser_fk);
            session()->put('id_user', $usario->id_user);
            switch ($usario->id_typeuser_fk) { // Comprovamos el tipo de usuario ( 1-5 )
                case '1':
                    return redirect('viewCliente');
                    break;
                case '2':
                    // echo "Camarero";
                    // return view('viewCamarero');
                    return redirect('viewCamarero');
                    break;
                case '3':
                    // echo "ADM establecimiento";
                    return redirect('viewAdm_LocalesCruds');
                    break;
                case '4':
                    // echo "ADM grupo";
                    return redirect('viewAdm_GrupoCruds');
                    break;
                case '5':
                    //echo "ADM master";
                    return redirect('cruds');
                    break;
                default:
                    # code...
                    break;
            }
        }else{
            //registrarse con la cuenta y hacer login
            // ! INSERTAR USUARIO CREADO CON FACEBOOK
            DB::table('tbl_user')->insertGetId(['name'=>$name,'lastname'=>$lastname,'gender'=>'No especificar','confidentiality'=>$consentimiento,'email'=>$user->getEmail(),'psswd'=>md5(Str::random(16)),'create_date'=>NOW(),'id_typeuser_fk'=>'1','google/facebook'=>'1']);
            $user = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $name);
            session()->put('typeuser', '1');
            //session()->put('typeuser', $user->id_typeuser_fk);
            session()->put('id_user', $user->id_user);
            return redirect('viewCliente');
        }
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback(Request $request){
        //return Socialite::driver('google')->redirect();
        $user = Socialite::driver('google')->user();
        $email= $user->getEmail();
        $name= $user->getName();
        $cadena = $name;
            $separador = " ";
            $separada = explode($separador, $cadena);
            $name=$separada[0];
            if(empty($separada[2])){
                $lastname=$separada[1];
            }else{
                $lastname=$separada[1].' '.$separada[2];
            }
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
            $usario = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $usario->name);
            // session()->put('typeuser', '1');
            session()->put('typeuser', $usario->id_typeuser_fk);
            session()->put('id_user', $usario->id_user);
            switch ($usario->id_typeuser_fk) { // Comprovamos el tipo de usuario ( 1-5 )
                case '1':
                    return redirect('viewCliente');
                    break;
                case '2':
                    // echo "Camarero";
                    // return view('viewCamarero');
                    return redirect('viewCamarero');
                    break;
                case '3':
                    // echo "ADM establecimiento";
                    return redirect('viewAdm_LocalesCruds');
                    break;
                case '4':
                    // echo "ADM grupo";
                    return redirect('viewAdm_GrupoCruds');
                    break;
                case '5':
                    //echo "ADM master";
                    return redirect('cruds');
                    break;
                default:
                    # code...
                    break;
            }
        }elseif($contador2==1){
            $usario = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $usario->name);
            // session()->put('typeuser', '1');
            session()->put('typeuser', $usario->id_typeuser_fk);
            session()->put('id_user', $usario->id_user);
            switch ($usario->id_typeuser_fk) { // Comprovamos el tipo de usuario ( 1-5 )
                case '1':
                    return redirect('viewCliente');
                    break;
                case '2':
                    // echo "Camarero";
                    // return view('viewCamarero');
                    return redirect('viewCamarero');
                    break;
                case '3':
                    // echo "ADM establecimiento";
                    return redirect('viewAdm_LocalesCruds');
                    break;
                case '4':
                    // echo "ADM grupo";
                    return redirect('viewAdm_GrupoCruds');
                    break;
                case '5':
                    //echo "ADM master";
                    return redirect('cruds');
                    break;
                default:
                    # code...
                    break;
            }
        }else{
            //registrarse con la cuenta y hacer login
            // ! INSERTAR USUARIO CREADO CON GOOGLE
            DB::table('tbl_user')->insertGetId(['name'=>$name,'lastname'=>$lastname,'gender'=>'No especificar','confidentiality'=>$consentimiento,'email'=>$user->getEmail(),'create_date'=>NOW(),'psswd'=>md5(Str::random(16)),'id_typeuser_fk'=>'1','google/facebook'=>'1']);
            $user = DB::table('tbl_user')->where('email','=',$user->getEmail())->first();
            session()->put('name', $name);
            // session()->put('typeuser', '1');
            session()->put('typeuser', $user->id_typeuser_fk);
            session()->put('id_user', $user->id_user);
            Mail::to($email)->send(new EmergencyCallReceived($user));
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
                    // echo "ADM establecimiento";
                    return redirect('viewAdm_LocalesCruds');
                    break;
                case '4':
                    // echo "ADM grupo";
                    return redirect('viewAdm_GrupoCruds');
                    break;
                case '5':
                    //echo "ADM master";
                    return redirect('cruds');
                    break;
                default:
                    # code...
                    break;
            }
        } else { // ! No existe usuario
            $message = 'Por favor, revise que el email y la contraseña estén bien escritos';
            return redirect('/')->with('message',$message);
        }
    }


    public function viewCliente(){
        if (session('typeuser') != 1 || !session()->has('id_user')) {
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
            DB::table('tbl_user')->insertGetId(['name'=>$datos['nombre'],'lastname'=>$datos['apellidos'],'gender'=>$datos['sexo'],'create_date'=>Now(),'confidentiality'=>$consentimiento,'email'=>$datos['email'],'psswd'=>md5($datos['psswd']),'id_typeuser_fk'=>'1']);
            $mensaje = 'Tu cuenta se ha creado correctamente';
            $email=$datos['email'];
            $user = DB::table('tbl_user')->where('email','=',$email)->first();
            Mail::to($email)->send(new MailBienvenida($user));
            return redirect('/')->with('mensaje',$mensaje);
        }else{
            $mensaje="El correo introducido ya está registrado";
            return redirect('registro')->with('mensaje',$mensaje);
        }
    }

    public function viewEstablecimiento(){
        if (session('typeuser') != 3 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('graficaAdminEstablecimiento');
        }
    }

    public function viewGrupo(){
        if (session('typeuser') != 4 || !session()->has('id_user')) {
            return redirect('/');
        } else {
            return view('graficaAdminGrupo');
        }
    }

    public function viewMaster(){
        if (session('typeuser') != 5) {
            return redirect('/');
        } else {
            return  view('viewAdm_master');
        }
    }

    public function password_reset(Request $request){
        return view('password_reset',compact('request'));
    }

    public function cambiar_password(Request $request){
        $datos = $request->except('_token');
        DB::select('UPDATE tbl_user SET `psswd`=? WHERE `id_user`=?',
        [md5($datos['psswd1']),
        $datos['id_user']]);
        return view('password_changed');
    }

    public function restaurar_pass(Request $request){
        $datos = $request->except('_token');
        $contar=DB::table('tbl_user')->where([
            ['email','=',$datos['email']]])->count();
            if($contar==1){
                //eviar correo para restaurar
                $email=$datos['email'];
                $user = DB::table('tbl_user')->where('email','=',$email)->first();
                Mail::to($email)->send(new RestaurarContra($user));
                $correcto = 'Email correcto, revise su bandeja';
                return redirect('/contra_olvidada')->with('correcto',$correcto);
            }else{
                //devolver diciendo que el correo no existe
                $message = 'El correo introducido no pertenece a ninguna cuenta';
                return redirect('/contra_olvidada')->with('message',$message);
            }
    }

    public function ver_usuarios(Request $request){
        $id_user = session()->get('id_user');
        $userLog = DB::select('SELECT * FROM tbl_user WHERE id_user = ?',[$id_user]);
        // $id_local = $userLog->id_local_fk;
        // $userLog->id_local_fk -> ID local del usuario logeado
        if ($request['fecha'] == null){
            $query = 'SELECT tbl_user.* FROM tbl_user
            LEFT JOIN tbl_card
            ON tbl_card.id_user_fk = tbl_user.id_user
            LEFT JOIN tbl_promotion
            ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion
                    WHERE (((tbl_user.id_typeuser_fk = 1) && (tbl_promotion.id_local_fk = ?)) || ((tbl_user.id_typeuser_fk = 2) && (tbl_user.id_local_fk = ?)))
                    AND tbl_user.`name` LIKE ? AND tbl_user.`lastname` LIKE ? AND tbl_user.`email` LIKE ?
                    AND tbl_user.`gender` LIKE ? AND tbl_user.`confidentiality` LIKE ?
                    AND tbl_user.`id_typeuser_fk` LIKE ? AND tbl_user.`status` LIKE ?
                    GROUP BY tbl_user.id_user
                       ORDER BY `tbl_user`.`id_typeuser_fk` DESC';
            $params = [ $userLog[0]->id_local_fk,
            $userLog[0]->id_local_fk,
            '%'.$request['nombre'].'%' ,
            '%'.$request['apellidos'].'%',
            '%'.$request['email'].'%',
            '%'.$request['sexo'].'%',
            '%'.$request['conf'].'%',
            '%'.$request['rol'].'%',
            '%'.$request['status'].'%'];
            //return response()->json('NULL',200);
        } else {
            $query = 'SELECT tbl_user.* FROM tbl_user
            LEFT JOIN tbl_card
            ON tbl_card.id_user_fk = tbl_user.id_user
            LEFT JOIN tbl_promotion
            ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion
                    WHERE (((tbl_user.id_typeuser_fk = 1) && (tbl_promotion.id_local_fk = ?)) || ((tbl_user.id_typeuser_fk = 2) && (tbl_user.id_local_fk = ?)))
                    AND tbl_user.`name` LIKE ? AND tbl_user.`lastname` LIKE ? AND tbl_user.`email` LIKE ?
                    AND tbl_user.`gender` LIKE ? AND tbl_user.`confidentiality` LIKE ?
                    AND tbl_user.`id_typeuser_fk` LIKE ? AND tbl_user.`status` LIKE ?
                    AND DATE (tbl_user.create_date) >= ?
                    GROUP BY tbl_user.id_user
                       ORDER BY `tbl_user`.`id_typeuser_fk` DESC';
            $params = [ $userLog[0]->id_local_fk,
            $userLog[0]->id_local_fk,
            '%'.$request['nombre'].'%' ,
            '%'.$request['apellidos'].'%',
            '%'.$request['email'].'%',
            '%'.$request['sexo'].'%',
            '%'.$request['conf'].'%',
            '%'.$request['rol'].'%',
            '%'.$request['status'].'%',
            $request['fecha']];
        }
        $usuarios = DB::select($query,$params);
        return response()->json($usuarios,200);
    }

    public function ver_usuario(Request $request){
        $id_user = $request['id_user']; // $id_user->id_local_fk
        $usuarios = DB::select('SELECT * FROM tbl_user WHERE id_user = ?',[$id_user]);
        return response()->json($usuarios,200);
    }

    public function ver_usuarios_master(Request $request){
        if ($request['fecha'] == null){
            $query = 'SELECT tbl_user.* FROM tbl_user
            LEFT JOIN tbl_card
            ON tbl_card.id_user_fk = tbl_user.id_user
            LEFT JOIN tbl_promotion
            ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion
                WHERE tbl_user.`name` LIKE ? AND tbl_user.`lastname` LIKE ? AND tbl_user.`email` LIKE ?
                AND tbl_user.`gender` LIKE ? AND tbl_user.`confidentiality` LIKE ?
                AND tbl_user.`id_typeuser_fk` LIKE ? AND tbl_user.`status` LIKE ?
                GROUP BY tbl_user.id_user
                    ORDER BY `tbl_user`.`id_typeuser_fk` DESC';
            $params = [ 
            '%'.$request['nombre'].'%' ,
            '%'.$request['apellidos'].'%',
            '%'.$request['email'].'%',
            '%'.$request['sexo'].'%',
            '%'.$request['conf'].'%',
            '%'.$request['rol'].'%',
            '%'.$request['status'].'%'];
            //return response()->json('NULL',200);
        } else {
            $query = 'SELECT tbl_user.* FROM tbl_user
            LEFT JOIN tbl_card
            ON tbl_card.id_user_fk = tbl_user.id_user
            LEFT JOIN tbl_promotion
            ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion
                WHERE tbl_user.`name` LIKE ? AND tbl_user.`lastname` LIKE ? AND tbl_user.`email` LIKE ?
                AND tbl_user.`gender` LIKE ? AND tbl_user.`confidentiality` LIKE ?
                AND tbl_user.`id_typeuser_fk` LIKE ? AND tbl_user.`status` LIKE ?
                AND DATE (tbl_user.create_date) >= ?
                GROUP BY tbl_user.id_user
                    ORDER BY `tbl_user`.`id_typeuser_fk` DESC';
            $params = [ 
            '%'.$request['nombre'].'%' ,
            '%'.$request['apellidos'].'%',
            '%'.$request['email'].'%',
            '%'.$request['sexo'].'%',
            '%'.$request['conf'].'%',
            '%'.$request['rol'].'%',
            '%'.$request['status'].'%',
            $request['fecha']];
        }
        $usuarios = DB::select($query,$params);
        return response()->json($usuarios,200);
    }

    public function eliminar_usuario(Request $request){
        $id_user = $request['id_usuario'];

        // TODO: HEMOS DE COMPROBAR EL TIPO DE USUARIO
        // * en función del usuario se eliminara al usuario de unas tablas u otras
        // ? Cliente -> Eliminar sellos, tarjetas y al usuario
        // ? Camarero ->
        // ? Adm establecimiento ->
        // ? Adm grupo ->
        // ? Adm master ->

        //Eliminar sellos
        // DELETE FROM `tbl_stamp` WHERE id_user_fk_stamp = 2
        // DELETE FROM `tbl_card` WHERE id_user_fk = 2
        // DELETE FROM `tbl_promotion` WHERE id_user_fk = 2

        // Si el usuario es de tipo cliente, hemos de elimar sus cartas y sellos
        // Comprobamos si el usuario tiene o ha tenido cartas
        $cards =  DB::select('SELECT * FROM tbl_card WHERE id_user_fk = ?',[$id_user]);
        foreach ($cards as $card){
            DB::select('DELETE FROM tbl_stamp WHERE id_card_fk = ?',[$card->id_card]);
            DB::select('DELETE FROM tbl_card WHERE id_user_fk = ?',[$id_user]);
            // Eliminamos cada una de las cartas
        }

        DB::select('DELETE FROM tbl_user WHERE id_user = ?',[$id_user]);
        // return response()->json('OK',200);

        return response()->json('OK',200);
    }
    public function registrar_usuario(Request $request){
        $consentimiento = 0;
        if($request['confidentiality'] == 'true'){
            $consentimiento = 1;
        }
        $local = $request['local'];
        if ($local == 0){
            $local = null;
        }
        $user = DB::select('SELECT * FROM `tbl_user` WHERE `email`=?',[$request['email']]);
        if (empty($user)){
            DB::table('tbl_user')->insertGetId(['name'=>$request['nombre'],
            'lastname'=>$request['apellidos'],
            'gender'=>$request['sexo'],
            'phone'=>$request['phone'],
            'confidentiality'=>$consentimiento,
            'email'=>$request['email'],
            'create_date'=>now(),
            'psswd'=>md5($request['psswd']),
            'id_local_fk'=>$local,
            'id_typeuser_fk'=>$request['rol']]);

            return response()->json(1,200);
        } else {
            return response()->json(0,200);
        }

    }

    public function actualizar_usuario(Request $request){
        $consentimiento = 0;
        if($request['confidentiality'] == 'true'){
            $consentimiento = 1;
        }
        $local = $request['local'];
        if ($local == 0){
            $local = null;
        }

        DB::select('UPDATE tbl_user SET `name`=?,`lastname`=?,`email`=?,`gender`=?,`confidentiality`=?,`id_typeuser_fk`=?, `id_local_fk`=? WHERE `id_user`=?',
        [$request['nombre'],
        $request['apellidos'],
        $request['email'],
        $request['sexo'],
        $consentimiento,
        $request['rol'],
        $local,
        $request['id_user']]);

        return response()->json('OK. Usuario actualizado correctamente.',200);
    }
    public function cambiar_estado(Request $request){
        if ($request['status']==1){
            DB::select('UPDATE tbl_user SET `status`=? WHERE `id_user`=?',
            ['Inhabilitado',$request['id_user']]);
            return response()->json('OK. Usuario inhabilitado correctamente.',200);
        } else {
            DB::select('UPDATE tbl_user SET `status`=? WHERE `id_user`=?',
            ['Activo',$request['id_user']]);
            return response()->json('OK. Usuario activado correctamente.',200);
        }
    }
    public function ver_locales_u(){
        $id_user = session()->get('id_user');
        $user = DB::select('SELECT * FROM `tbl_user` WHERE `id_user`=?',[$id_user]);
        $locales = DB::select('SELECT * FROM `tbl_local` WHERE `id_local`=?',[$user[0]->id_local_fk]);
        return response()->json($locales,200);
    }

    // public function sendSessionId(){
    //     $id_user = session()->get('id_user');
    //     $id_type = DB::select('SELECT tbl_user.id_typeuser_fk FROM tbl_user WHERE tbl_user.id_user= ?',[$id_user]);
    //     return response()->json($id_type);
    // }

    // ! FUNCION PARA RECOGER EL HISTORIAL DEL USUARIO
    public function verHistorial() {
        $id_user = session()->get('id_user');
        $historial = DB::select('SELECT tbl_card.status_card, tbl_card.stamp_now, tbl_promotion.stamp_max, DATE(tbl_card.create_date) AS create_date, DATE(tbl_card.complete_date_card) AS complete_date_card, tbl_promotion.name_promo, tbl_card.id_card FROM `tbl_card`
        INNER JOIN tbl_promotion
        ON tbl_card.id_promotion_fk = tbl_promotion.id_promotion
        WHERE id_user_fk = ? ORDER BY `tbl_card`.`status_card` ASC', [$id_user]);
        return response()->json($historial,200);
    }

    // ! FUNCION PARA RECOGER LOS DATOS DEL PERFIL USUARIO
    public function verInfouser() {
        $id_user = session()->get('id_user');
        $infoUser = DB::select('SELECT * FROM `tbl_user` WHERE id_user = ?', [$id_user]);
        return response()->json($infoUser,200);
    }

    public function editPerfil() {
        $id_user = session()->get('id_user');
        $infoUser = DB::select('SELECT * FROM `tbl_user` WHERE id_user = ?', [$id_user]);
        return response()->json($infoUser,200);
    }

    public function editarPerfil() {
        //redirige a la vista login si no has iniciado sesion.
        return view('editarPerfil');
    }

    public function editar($id){
        $usuario=DB::table('tbl_user')->where('id_user', '=', $id)->first();
        
        return view('editarPerfil', compact('usuario'));
    }

    public function actualizarDatosUsuario($id, Request $request){
        
        $datos=request()->except('_token','enviar','_method', 'email');
        DB::table('tbl_user')->where('id_user', '=', $id)->update(['name'=>$request['name'],'lastname'=>$request['lastname'],'phone'=>$request['phone'],'gender'=>$request['gender'],'psswd'=>MD5($request['psswd'])]);

        return redirect('perfilU');
    }
}

