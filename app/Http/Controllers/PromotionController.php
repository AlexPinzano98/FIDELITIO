<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function ver_promociones(){
        $promos = DB::select('SELECT * FROM tbl_promotion');

        return response()->json($promos,200);
    }
}
