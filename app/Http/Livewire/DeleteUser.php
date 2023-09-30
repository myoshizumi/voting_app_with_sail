<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Response;

class DeleteUser extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public  function deleteUser()
    {
        if (auth()->guest() || auth()->user()->cannot('delete', $this->user)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        User::destroy($this->user->id);

        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('livewire.delete-user');
    }
}