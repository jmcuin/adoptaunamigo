<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NuevoRescatista' => [
            'App\Listeners\NuevoRescatistaListener',
        ],
        'App\Events\NuevaSolicitud' => [
            'App\Listeners\NuevaSolicitudListener',
        ],
        'App\Events\NuevaNotificacion' => [
            'App\Listeners\NuevaNotificacionListener',
        ],
        'App\Events\NuevoAmigo' => [
            'App\Listeners\NuevoAmigoListener',
        ],
        'App\Events\NuevoEvento' => [
            'App\Listeners\NuevoEventoListener',
        ],
        'App\Events\NuevoExtravio' => [
            'App\Listeners\NuevoExtravioListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
