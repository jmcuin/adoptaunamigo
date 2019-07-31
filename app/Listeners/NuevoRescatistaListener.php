<?php

namespace App\Listeners;

use App\Events\NuevoRescatista;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Notificacion;

class NuevoRescatistaListener implements ShouldQueue
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
     * @param  NuevoRescatista  $event
     * @return void
     */
    public function handle(NuevoRescatista $event)
    {
        //
        $rescatista = $event -> rescatista;
        $ruta = $event -> ruta;

        Mail::send('emails.nuevo_rescatista', ['rescatista' => $rescatista, 'ruta' => $ruta], function($s) use ($rescatista, $ruta){
            $s -> to($rescatista -> email) -> subject('Bienvenido(a): '.$rescatista -> nombre);
        });
    }
}
