<?php

namespace App\Listeners;

use App\Events\NuevoExtravio;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Notificacion;

class NuevoExtravioListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NuevoExtravio  $event
     * @return void
     */
    public function handle(NuevoExtravio $event)
    {
        //
        $extravio = $event -> extravio;
        $ruta = $event -> ruta;

        Mail::send('emails.nuevo_extravio_duenio', ['extravio' => $extravio, 'ruta' => $ruta], function($s) use ($extravio, $ruta){
            $s -> to($extravio -> email) -> subject('Comencemos la búsqueda de '.$extravio -> nombre);
            });

        $notificaciones = Notificacion::all();
        foreach ($notificaciones as $notificacion) {
            Mail::send('emails.nuevo_extravio', ['extravio' => $extravio, 'ruta' => $ruta, 'notificacion' => $notificacion], function($s) use ($extravio, $ruta, $notificacion){
            $s -> to($notificacion -> email) -> subject('¿Has visto a '.$extravio -> nombre.'?');
            });
        }
    }
}
