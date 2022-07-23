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
    
     //Guardando noTripul$noTripuladas en la base de dato mediante una api
     public function setNoTriupaladas(Request $request){

        $modeloNave = new Nave;
        $noTripulada = new NoTripulada;
        
        //Guardando primero la nave
        $modeloNave->nombre = $request -> nombre;
        $modeloNave->combustible = $request -> combustible;
        $modeloNave->funcion = $request -> funcion;
        $modeloNave->primer_lanzamiento = $request -> primer_lanzamiento;
        $modeloNave->ultimo_lanzamiento = $request -> ultimo_lanzamiento;
        $modeloNave->estado = $request -> estado;
        $modeloNave->pais = $request -> pais;
        $modeloNave->save();

        //Guardando despues el tipo de nave
        $noTripulada->velocidad = $request->velocidad;
        $noTripulada->empuje = $request->empuje;
        $noTripulada->nombre_nave = $request->nombre;

        $noTripulada->save();

        return response()-> json([
            'status'=> 'ok',
            
        ]);
     }
}
