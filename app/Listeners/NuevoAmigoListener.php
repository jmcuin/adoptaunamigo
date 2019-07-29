<?php

namespace App\Listeners;

use App\Events\NuevoAmigo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Notificacion;

class NuevoAmigoListener
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
     * @param  NuevoAmigo  $event
     * @return void
     */
    public function handle(NuevoAmigo $event)
    {
        //
        $amigo = $event -> amigo;
        $ruta = $event -> ruta;

        $notificaciones = Notificacion::all();
        foreach ($notificaciones as $notificacion) {
            Mail::send('emails.nuevo_amigo', ['amigo' => $amigo, 'ruta' => $ruta, 'notificacion' => $notificacion], function($s) use ($amigo, $ruta, $notificacion){
            $s -> to($notificacion -> email) -> subject('Te presentamos a: '.$amigo -> nombre);
            });
        } 
    }
}
