<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function ver_companyias(){
        $companyias = DB::select('SELECT * FROM tbl_company');
        return response()->json($companyias,200);
    }
}
