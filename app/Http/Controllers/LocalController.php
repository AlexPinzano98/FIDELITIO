<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocalController extends Controller
{
    public function ver_locales(){
        $locales = DB::select('SELECT * FROM tbl_local');
        return response()->json($locales,200);
    }
}
