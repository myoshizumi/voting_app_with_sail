<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersIndex extends Component
{
    public function render()
    {
        return view('livewire.users-index', [
            "users" => User::all()
        ]);
    }
}
