<?php

namespace App\Listeners;

use App\Events\NuevoServicio;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Notificacion;

class NuevoServicioListener implements ShouldQueue
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
     * @param  NuevoServicio  $event
     * @return void
     */
    public function handle(NuevoServicio $event)
    {
        //
        $servicio = $event -> servicio;
        $ruta = $event -> ruta;

        $notificaciones = Notificacion::all();
        foreach ($notificaciones as $notificacion) {
            Mail::send('emails.nuevo_servicio', ['servicio' => $servicio, 'ruta' => $ruta, 'notificacion' => $notificacion], function($s) use ($servicio, $ruta, $notificacion){
            $s -> to($notificacion -> email) -> subject('Descubre una nueva forma de concentir a tu mascota '.$servicio -> servicio);
            });
        }
    }
}
