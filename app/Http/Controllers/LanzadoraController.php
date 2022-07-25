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

            //Se busca el modelo de la nave y se usa el metodo where para buscar los registros de la base de datos
            //con los parametros que se le pasan
            $nave = $modeloNave-> where('nombre', $lanzadora->nombre_nave)->first(); 
            $lanzadora -> combustible =  $nave -> combustible;
            $lanzadora -> funcion =  $nave -> funcion;
            $lanzadora -> primer_lanzamiento =  $nave -> primer_lanzamiento;
            $lanzadora -> ultimo_lanzamiento =  $nave -> ultimo_lanzamiento;
            $lanzadora -> estado =  $nave -> estado;
            $lanzadora -> pais =  $nave -> pais;
            $lanzadora -> tipo =  'Lanzadora';
        }

        //Se devuelve un json con el arreglos de las naves lanzadoras
        return response()-> json([
            'status'=> 'ok',
            'data' => $lanzadoras
        ]);
     }
     //Guardando lanzadoras en la base de dato mediante una api
     //Se pide un request que son los datos que se van a pasar por la solicitud
     public function setLanzadora(Request $request){

        $modeloNave = new Nave;
        $lanzadora = new Lanzadora;
        
        //Guardando primero la nave
        //se guarda primero la nave porque es la clase padre
        $modeloNave->nombre = $request -> nombre;
        $modeloNave->combustible = $request -> combustible;
        $modeloNave->funcion = $request -> funcion;
        $modeloNave->primer_lanzamiento = $request -> primer_lanzamiento;
        $modeloNave->ultimo_lanzamiento = $request -> ultimo_lanzamiento;
        $modeloNave->estado = $request -> estado;
        $modeloNave->pais = $request -> pais;
        $modeloNave->save();

        //Guardando despues el tipo de nave
        $lanzadora->empuje = $request->empuje;
        $lanzadora->potencia = $request->potencia;
        $lanzadora->capacidad_transporte = $request->capacidad_transporte;
        $lanzadora->altura = $request->altura;
        $lanzadora->nombre_nave = $request->nombre;

        $lanzadora->save();

        return response()-> json([
            'status'=> 'ok',
            
        ]);
     }
}
