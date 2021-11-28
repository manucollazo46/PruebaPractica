<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ElTiempoGaliciaMail extends Mailable
{
    use Queueable, SerializesModels;

    //Creamos las variables para asignarle en el constructor lo que recibamos
    public $info_total;
    public $array_nombre_datos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info,$array_nombre_datos)
    {
        $this->info_total = $info;
        $this->array_nombre_datos = $array_nombre_datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //Enviamos por mail el correo de la vista correo.eltiempogaliciamail pasandole las variables almacenadas
        return $this->view('correo.eltiempogaliciamail')
                    ->with('info_total', $this->info_total)
                    ->with('array_nombre_datos', $this->array_nombre_datos);
    }
}
