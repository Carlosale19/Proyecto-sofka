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
        
        //Recogiendo datos y mostrandolos como API

        foreach($tripuladas as $tripulada){
            $nave = $modeloNave-> where('nombre', $tripulada->nombre_nave)->first(); 
            $tripulada -> combustible =  $nave -> combustible;
            $tripulada -> funcion =  $nave -> funcion;
            $tripulada -> primer_lanzamiento =  $nave -> primer_lanzamiento;
            $tripulada -> ultimo_lanzamiento =  $nave -> ultimo_lanzamiento;
            $tripulada -> estado =  $nave -> estado;
            $tripulada -> pais =  $nave -> pais;
            $tripulada -> tipo =  'Tripulada';
        }
        return response()-> json([
            'status'=> 'ok',
            'data' => $tripuladas
        ]);
    }

    //Guardando tripuladas en la base de dato mediante una api 
    public function setTripuladas(Request $request){

        $modeloNave = new Nave;
        $tripulada = new Tripulada;
        
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
        $tripulada->capacidad_tripulantes = $request->capacidad_tripulantes;
        echo $request->capacidad_tripulantes;die;
        $tripulada->peso = $request->peso;
        $tripulada->km_orbita = $request->km_orbita; 
        $tripulada->nombre_nave = $request->nombre;

        $tripulada->save();

        return response()-> json([
            'status'=> 'ok',
            
        ]);
     }
}
