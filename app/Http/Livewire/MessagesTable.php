<?php

namespace App\Http\Livewire;

use App\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class MessagesTable extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function render()
    {
        $this->authorize('read messages');

        return view('livewire.messages-table', [
            'messages' => Message::paginate(12)
        ]);
    }
}
