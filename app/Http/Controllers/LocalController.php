<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LocalController extends Controller
{
    public function ver_locales(Request $request){
        $locales = DB::select('SELECT tbl_local.*,tbl_user.email,tbl_company.name AS company,tbl_group.groupname,tbl_direction.* FROM `tbl_local` 
        INNER JOIN tbl_user ON tbl_local.id_user_fk= tbl_user.id_user 
        INNER JOIN tbl_company ON tbl_local.id_company_fk=tbl_company.id_company 
        INNER JOIN tbl_group ON tbl_local.id_group_fk=tbl_group.id_group
        INNER JOIN tbl_direction ON tbl_local.id_local = tbl_direction.id_local_fk 
        WHERE tbl_local.name LIKE ? AND tbl_user.email LIKE ? AND tbl_company.name LIKE ?
        AND tbl_group.groupname LIKE ? AND tbl_direction.name_street LIKE ?
        AND tbl_direction.cod_postal LIKE ? AND tbl_direction.town_name LIKE ?
        ORDER BY `tbl_local`.`id_local` ASC', 
        ['%'.$request['nombre'].'%',
        '%'.$request['email'].'%',
        '%'.$request['company'].'%',
        '%'.$request['grupo'].'%',
        '%'.$request['dir'].'%',
        '%'.$request['cp'].'%',
        '%'.$request['ciudad'].'%' ]); 
        return response()->json($locales,200);
    }
    public function registrar_local(Request $request){
        $id_user = session()->get('id_user');

        DB::select('INSERT INTO tbl_local (`name`,id_user_fk,`id_company_fk`,id_group_fk)
        VALUES (?,?,?,?)',[$request['nombre'], $id_user, $request['company'], $request['grupo']]);
       // Hemos de recuperar el id
       $id = DB::select('SELECT id_local FROM tbl_local WHERE `name` LIKE ? AND id_user_fk LIKE ?
       AND id_company_fk LIKE ? AND id_group_fk LIKE ?',
       [$request['nombre'], $id_user, $request['company'], $request['grupo']]);
        // $id[0]->id_local
        DB::select('INSERT INTO tbl_direction (`name_street`,num_street,`cod_postal`,town_name,id_local_fk)
        VALUES (?,?,?,?,?)',
        [$request['dir'],$request['num_dir'],$request['cod_pos'],$request['ciudad'],$id[0]->id_local]);

        return response()->json('OK. Establecimiento registrado correctamente',200);
    }
    public function eliminar_local(Request $request){
        $id_local = $request['id_local'];
        // Eliminar dirección + local
        DB::select('DELETE FROM tbl_direction WHERE id_local_fk = ?',[$id_local]);
        DB::select('DELETE FROM tbl_promotion WHERE id_local_fk = ?',[$id_local]);
        // Recorrer todas las promociones y eliminar sellos, tarjetas
        DB::select('DELETE FROM tbl_local WHERE id_local = ?',[$id_local]);

        return response()->json('OK. Establecimiento eliminado correctamente',200);
    }
    public function ver_companys_l(){
        $company = DB::select('SELECT * FROM `tbl_company`');
        return response()->json($company,200);
    }
    public function ver_grupos_l(){
        $group = DB::select('SELECT * FROM `tbl_group`');
        return response()->json($group,200);
    }
    public function ver_local(Request $request){
        $id_local = $request['id_local'];
        $local = DB::select('SELECT tbl_local.*,tbl_user.email,tbl_company.name AS company,tbl_group.groupname,tbl_direction.* FROM `tbl_local` 
        INNER JOIN tbl_user ON tbl_local.id_user_fk= tbl_user.id_user 
        INNER JOIN tbl_company ON tbl_local.id_company_fk=tbl_company.id_company 
        INNER JOIN tbl_group ON tbl_local.id_group_fk=tbl_group.id_group
        INNER JOIN tbl_direction ON tbl_local.id_local = tbl_direction.id_local_fk 
        WHERE id_local = ?',[$id_local]);
        return response()->json($local,200);
    }
    public function actualizar_local(Request $request){
        DB::select('UPDATE `tbl_local` SET `name` = ?,`id_company_fk` = ?, id_group_fk = ?
        WHERE `tbl_local`.`id_local` = ?' , [
            $request['nombre'], $request['company'], $request['grupo'], $request['id_local']
        ]);
        DB::select('UPDATE `tbl_direction` SET `name_street` = ?,`num_street` = ?, cod_postal = ?, town_name = ?
        WHERE `tbl_direction`.`id_local_fk` = ?' , [
            $request['dir'], $request['num_dir'], $request['cod_pos'], $request['ciudad'], $request['id_local']
        ]);
        
        return response()->json('OK. Establecimiento actualizado correctamente.',200);
    }
}
