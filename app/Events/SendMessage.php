<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $convo_id;
    public $sender_id;
    public $receiver_id;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($convo_id,$sender_id,$receiver_id,$message)
    {
        error_log('Entered Event');
        error_log($convo_id);
        error_log($sender_id);
        error_log($receiver_id);
        error_log($message);

        $this->receiver_id = $receiver_id;
        $this->sender_id = $sender_id;
        $this->message = $message;
        $this->convo_id = $convo_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        error_log('broad on');
        // return new PrivateChannel('send-message');

        // return new PrivateChannel('private-chat.'.$this->convo_id);
        return new PrivateChannel('private-chat.'.$this->receiver_id);
        // return new Channel('chat');
    }

    public function broadcastAs()
    {
        error_log('broad as');
        return 'SendMessage';
    }
}
