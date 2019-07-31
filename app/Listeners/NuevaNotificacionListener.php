<?php

namespace App\Listeners;

use App\Events\NuevaNotificacion;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;


class NuevaNotificacionListener implements ShouldQueue
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
     * @param  NuevaNotificacion  $event
     * @return void
     */
    public function handle(NuevaNotificacion $event)
    {
        //
        $notificacion = $event -> notificacion;

        Mail::send('emails.actualizacion', ['notificacion' => $notificacion], function($s) use ($notificacion){
            $s -> to($notificacion -> email) -> subject('Gracias por registrarte en http://adoptamorelia.herokuapp.com/');
        });
    }
}
