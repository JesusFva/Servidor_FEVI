<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CP;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CodigosController extends Controller
{
    public function lista_cps($cp){
       
        //$cp = $request-> cp;

         Log::notice($cp);
     
             $sql = "SELECT DISTINCT estado, municipio FROM c_p_s WHERE codigo ='$cp'  ";
             $cps = DB::select($sql);
             Log::notice($cps);
             return $cps;

             //return view('domicilio.form', compact('cps'));
            
         
    }
     
         public function lista_colonias($cp){
             $colonias = DB::table('c_p_s')
                        ->where('codigo','=', $cp)
                        ->select('colonia')
                        ->get();
             Log::notice($colonias);
             return $colonias;
         }
}
