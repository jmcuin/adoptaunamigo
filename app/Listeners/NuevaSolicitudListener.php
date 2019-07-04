<?php

namespace App\Listeners;

use App\Events\NuevaSolicitud;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class NuevaSolicitudListener
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
     * @param  NuevaSolicitud  $event
     * @return void
     */
    public function handle(NuevaSolicitud $event)
    {
        //
        $solicitud = $event -> solicitud;
        $amigo = $event -> amigo;

        Mail::send('emails.notificacion', ['solicitud' => $solicitud, 'amigo' => $amigo], function($s) use ($solicitud, $amigo){
            $s -> to($solicitud -> email, $solicitud -> nombre_solicitante) -> subject('Gracias por adoptar a '.$amigo -> nombre);
        });

        Mail::send('emails.solicitud', ['solicitud' => $solicitud, 'amigo' => $amigo], function($s) use ($solicitud, $amigo){
            $s -> to($amigo -> rescatista -> email, $amigo -> rescatista -> nombre) -> subject('Alguien quiere adoptar a '.$amigo -> nombre);
        });
    }
}
