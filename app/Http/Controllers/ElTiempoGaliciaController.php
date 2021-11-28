<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ElTiempoGaliciaMail;
use Illuminate\Support\Facades\Mail;

class ElTiempoGaliciaController extends Controller
{
    public function index(){
        
        $array_columnas_tabla = array('Ciudad','Temperatura actual [ºC]', 'Latitud', 'Longitud', 'Humedad actual [%]', 'Velocidad del viento [m/s]'  );
        $tiempo_ciudades = $this->obtenerDatosGalicia();

        //Le pasamos a la vista el nombre de las columnas y el array con toda la info
        return view('index')
            ->with('columnas', $array_columnas_tabla)
            ->with('info', $tiempo_ciudades);

    }
    
    public function obtenerDatosGalicia(){
        //Definimos constantes 
        $api_key = '302d396d81a54f5d1e28510deaa53a08';
        $array_ciudades = array('A Coruña', 'Pontevedra', 'Ourense', 'Lugo');

        
        //Creamos el array en el que va a ir toda la informacion
        $array_info_total = [];

        //Hacemos petición a la api OWM con la ciudad correspondiente
        for ($i=0; $i < count($array_ciudades); $i++) { 
            
            $url_api = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$array_ciudades[$i].'&appid='.$api_key);
            $json_datos_api = json_decode($url_api, true);
            
            //Creamos un array con la info de esa ciudad
            $array_info_ciudad = array(
                $json_datos_api['name'],
                $this->convertir_temperatura_celsius($json_datos_api['main']['temp']),
                $json_datos_api['coord']['lat'],
                $json_datos_api['coord']['lon'],
                $json_datos_api['main']['humidity'],
                $json_datos_api['wind']['speed']
            );

            //Añadimos la info de esa ciudad al array en el que va a ir toda la info
            $array_info_total[$i] = $array_info_ciudad;
        }
        return $array_info_total;
    }

    //Funcion para convertir la temperatura que nos llega del array de Kelvin a Celsius
    private function convertir_temperatura_celsius($temperatura_kelvin){
        $temperatura_celsius = intval($temperatura_kelvin) - 273.15;
        return round($temperatura_celsius,2);
    }

   
}
