<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function render()
    {
        $this->authorize('view users');

        return view('livewire.users-table', [
            'users' => User::paginate(12)
        ]);
    }
}
