<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Response;

class DeleteUser extends Component
{
    public User $user;

    protected $listeners = ['setDeleteUser'];

    public function setDeleteUser($userId)
    {
        $this->user = User::findOrFail($userId);

        $this->emit('deleteUserWasSet');
    }

    public  function deleteUser()
    {
        if (auth()->guest() || auth()->user()->cannot('delete', $this->user)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        User::destroy($this->user->id);

        $this->emit('userWasDeleted');

        session()->flash('success_message', 'User was deleted successfully!');
        
        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('livewire.delete-user');
    }
}