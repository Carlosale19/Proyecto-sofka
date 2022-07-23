<?php

namespace App\Http\Controllers;

use App\Models\Nave;
use App\Models\Tripulada;
use Illuminate\Http\Request;

class TripuladaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTripuladas(){

        $modeloNave = new Nave;
        $tripuladas = tripulada::all();
        
        //Recogiendo los datos del modelo Nave para juntarlo con todos los de su tipo y ponerlos en el API

        foreach($tripuladas as $tripulada){
            $nave = $modeloNave-> where('nombre', $tripulada->nombre_nave)->first(); 
            $tripulada -> combustible =  $nave -> combustible;
            $tripulada -> funcion =  $nave -> funcion;
            $tripulada -> primer_lanzamiento =  $nave -> primer_lanzamiento;
            $tripulada -> ultimo_lanzamiento =  $nave -> ultimo_lanzamiento;
            $tripulada -> estado =  $nave -> estado;
            $tripulada -> pais =  $nave -> pais;
        }
        return response()-> json([
            'status'=> 'ok',
            'data' => $tripuladas
        ]);
    }
}
