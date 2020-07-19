<?php

namespace App\Http\Livewire;

use App\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class MyMessages extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $reading = [];

    public function open($id)
    {
        $message = Message::where('user_id', auth()->id())->findOrFail($id);

        $message->update([
            'seen' => now()
        ]);

        $this->reading = $message;
    }

    public function acknowledge($id)
    {
        $message = Message::where('user_id', auth()->id())->findOrFail($id);

        $message->update([
            'acknowledged' => now()
        ]);
    }

    public function close()
    {
        $this->reset();
    }

    public function render()
    {
        $this->authorize('read messages');

        return view('livewire.my-messages', [
            'messages' => Message::where('user_id', auth()->id())->paginate(12),
        ]);
    }
}
