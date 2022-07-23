<?php

namespace App\Http\Controllers;

use App\Models\Nave;
use App\Models\Lanzadora;
use Illuminate\Http\Request;

class LanzadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function getLanzadoras(){

        $modeloNave = new Nave;
        $lanzadoras = Lanzadora::all();
        
        //Recogiendo los datos del modelo Nave para juntarlo con todos los de su tipo y ponerlos en el API

        foreach($lanzadoras as $lanzadora){
            $nave = $modeloNave-> where('nombre', $lanzadora->nombre_nave)->first(); 
            $lanzadora -> combustible =  $nave -> combustible;
            $lanzadora -> funcion =  $nave -> funcion;
            $lanzadora -> primer_lanzamiento =  $nave -> primer_lanzamiento;
            $lanzadora -> ultimo_lanzamiento =  $nave -> ultimo_lanzamiento;
            $lanzadora -> estado =  $nave -> estado;
            $lanzadora -> pais =  $nave -> pais;
        }
        return response()-> json([
            'status'=> 'ok',
            'data' => $lanzadoras
        ]);
     }
}
