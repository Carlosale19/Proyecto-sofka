<?php

namespace App\Http\Controllers;

use App\Models\Nave;
use App\Models\NoTripulada;
use Illuminate\Http\Request;

class NoTripuladaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getNoTripuladas(){

        $modeloNave = new Nave;
        $noTripuladas = NoTripulada::all();
        
        //Recogiendo los datos del modelo Nave para juntarlo con todos los de su tipo y ponerlos en el API

        foreach($noTripuladas as $noTripulada){
            $nave = $modeloNave-> where('nombre', $noTripulada->nombre_nave)->first(); 
            $noTripulada -> combustible =  $nave -> combustible;
            $noTripulada -> funcion =  $nave -> funcion;
            $noTripulada -> primer_lanzamiento =  $nave -> primer_lanzamiento;
            $noTripulada -> ultimo_lanzamiento =  $nave -> ultimo_lanzamiento;
            $noTripulada -> estado =  $nave -> estado;
            $noTripulada -> pais =  $nave -> pais;
            $noTripulada -> tipo =  'No tripulada';
        }
        return response()-> json([
            'status'=> 'ok',
            'data' => $noTripuladas
        ]);
     }
    
}
