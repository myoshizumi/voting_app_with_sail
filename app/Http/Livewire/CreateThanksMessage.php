<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithAuthRedirects;
use App\Models\ThanksMessage;
use App\Models\User;
use Illuminate\Http\Response;
use Livewire\Component;

class CreateThanksMessage extends Component
{
    use WithAuthRedirects;

    public $thanksToId;
    public $thanksTo;
    public $thanksFrom;
    public $users;
    public $reason;
    public $thanksMessage;

    protected $rules = [
        'reason' => 'required|min:3|max:399',
    ];
    protected $listeners = ['setConfirmThanksMessage'];

    public function mount(ThanksMessage $thanksMessage)
    {
        $this->thanksMessage = $thanksMessage;
        $this->users = User::select('name', 'id')->get();
        // $this->users = User::all();
    }

    public function checkThanksMessage()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $this->emit('setConfirmThanksMessage');
    }

    public function setConfirmThanksMessage()
    {
        $this->emit('confirmThanksMessageWasSet');
    }

    public function createThanksMessage()
    {
        $this->validate();

        $thanksMessage = ThanksMessage::create([
            'user_id' => auth()->id(),
            'thanks_from' => auth()->user()->name,
            'thanks_to_id' => $this->thanksToId,
            'thanks_to' => $this->users->find($this->thanksToId)->name,
            'reason' => $this->reason,
        ]);

        $this->reset();

        // $this->emit('thanksMessageWasConfirmed', 'ありがとうの投稿が完了しました！');

        session()->flash('success_message', 'ありがとうの投稿が完了しました！');

        return redirect()->route('thanks-message.index');
    }

    public function render()
    {
        return view('livewire.create-thanks-message', [
            'users' => User::query()->with('thanksMessage'),
        ]);
    }
}