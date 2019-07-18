<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NuevaSolicitud
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $amigo;
    public $solicitud;
    public $ruta;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($amigo, $solicitud, $ruta)
    {
        //
        $this -> amigo = $amigo;
        $this -> solicitud = $solicitud;
        $this -> ruta = $ruta;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
