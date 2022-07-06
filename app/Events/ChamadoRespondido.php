<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChamadoRespondido implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $chamado;

    public function __construct($chamado)
    {
        $this->chamado = $chamado;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('comum');
    }

    public function broadcastWith()
    {
        return ['titulo' => "Chamado #{$this->chamado}", 'mensagem' => "Seu chamado foi respondido"];
    }

    public function broadcastAs()
    {
        return 'ChamadoRespondido';
    }
}
