<?php

namespace App\Listeners;

use App\Events\NuevoEvento;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Notificacion;

class NuevoEventoListener
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
     * @param  NuevoEvento  $event
     * @return void
     */
    public function handle(NuevoEvento $event)
    {
        //
        $evento = $event -> evento;
        $ruta = $event -> ruta;

        $notificaciones = Notificacion::all();
        foreach ($notificaciones as $notificacion) {
            Mail::send('emails.nuevo_evento', ['evento' => $evento, 'ruta' => $ruta, 'notificacion' => $notificacion], function($s) use ($evento, $ruta, $notificacion){
            $s -> to($notificacion -> email) -> subject('Te invitamos a '.$evento -> nombre);
            });
        }
    }
}
