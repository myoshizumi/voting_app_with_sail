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

    protected $rules = [
        'thanksTo' => 'required',
        'reason' => 'required|min:5|max:399',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function createThanksMessage()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $thanksMessage = ThanksMessage::create([
            'user_id' => auth()->id(),
            'thanks_from' => auth()->user()->name,
            'thanks_to' => $this->thanksTo,
            'reason' => $this->reason,
        ]);

        session()->flash('success_message', 'ありがとうの投稿が完了しました！');

        $this->reset();

        return redirect()->route('thanks-message.index');
    }

    public function render()
    {
        return view('livewire.create-thanks-message', ['users' => User::all(),]);
    }
}
