<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function ver_companys(Request $request){
        $companys = DB::select('SELECT tbl_company.*,tbl_user.email FROM `tbl_company` 
        INNER JOIN tbl_user ON tbl_company.id_user_fk = tbl_user.id_user
        WHERE tbl_company.name LIKE ? AND tbl_user.email LIKE ?',
        ['%'.$request['nombre'].'%',
        '%'.$request['email'].'%']); 
        return response()->json($companys,200);
    }
    public function registrar_company(Request $request){
        $id_user = session()->get('id_user');

        DB::select('INSERT INTO tbl_company (`name`,id_user_fk)
        VALUES (?,?)',[$request['nombre'], $id_user]);

        return response()->json('OK. Compañia registrada correctamente',200);
    }
    public function eliminar_company(Request $request){
        DB::select('DELETE FROM tbl_local WHERE id_company_fk = ?',[$request['id_company']]);
        DB::select('DELETE FROM tbl_company WHERE id_company = ?',[$request['id_company']]);
        return response()->json('OK. Compañia eliminada correctamente',200);
    }
}