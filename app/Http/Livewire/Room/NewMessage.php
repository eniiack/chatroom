<?php

namespace App\Http\Livewire\Room;

use App\Events\Room\MessageAdded;
use App\Models\Room;
use Livewire\Component;

class NewMessage extends Component
{
    public $message;
    public Room $room;
    protected $rules = [
        'message' => 'required'
    ];

    public function newMessage()
    {
        $this->validate();
       $newMessage = $this->room->messages()->create([
            'user_id' => auth()->user()->id,
            'body' => $this->message
        ]);
        $this->emit('message.added' , $newMessage->id);
        broadcast(new MessageAdded($this->room->id,$newMessage->id))->toOthers();
        $this->message = '';

    }
    public function render()
    {
        return view('livewire.room.new-message');
    }
}
