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

    public $thanksTo;
    public $thanksFrom;
    public $user;
    public $reason;
    public $thanksMessage;

    protected $rules = [
        'thanksTo' => 'required',
        'reason' => 'required|min:3|max:399',
    ];
    protected $listeners = ['setConfirmThanksMessage'];

    public function mount(User $user, ThanksMessage $thanksMessage)
    {
        $this->thanksMessage = $thanksMessage;
        $this->user = $user;
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
            'thanks_to' => $this->thanksTo,
            'reason' => $this->reason,
        ]);

        $this->reset();

        // $this->emit('thanksMessageWasConfirmed', 'ありがとうの投稿が完了しました！');

        session()->flash('success_message', 'ありがとうの投稿が完了しました！');

        return redirect()->route('thanks-message.index');
    }

    public function render()
    {
        return view('livewire.create-thanks-message', ['users' => User::all(),]);
    }
}