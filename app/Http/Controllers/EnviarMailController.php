<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ElTiempoGaliciaMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ElTiempoGaliciaController;

class EnviarMailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Obtenemos los datos del tiempo y creamos las variables de las columnas
        $datos = new ElTiempoGaliciaController();
        $info_total = $datos->obtenerDatosGalicia();
        $array_nombre_datos = array('Ciudad','Temperatura actual [ºC]', 'Latitud', 'Longitud', 'Humedad actual [%]', 'Velocidad del viento [m/s]'  );
        
        //Enviamos el Mail con las variables que contienen la info y el nombre de las columnas
        Mail::to('manucollazo46@gmail.com')->send(new ElTiempoGaliciaMail($info_total, $array_nombre_datos));
        return Redirect::to('/');
    }
}
