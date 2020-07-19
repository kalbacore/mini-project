<?php

namespace App\Http\Livewire;

use App\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\User;

class CreateMessage extends Component
{
    use AuthorizesRequests;

    public $title;
    public $body;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function send()
    {
        $this->authorize('create messages');

        Message::create(array_merge($this->validate([
            'title' => ['required', 'min:4'],
            'body' => ['required'],
        ]), [
            'user_id' => $this->user->id,
            'creator_id' => auth()->id(),
        ]));

        redirect(route('messages'));
    }

    public function render()
    {
        return view('livewire.create-message');
    }
}
