<?php

namespace App\Http\Livewire;

use App\Models\ThanksMessage;
use Livewire\Component;

class ThanksMessagesIndex extends Component
{
    public $thanksMessages;

    public function mount()
    {
        $this->thanksMessages = ThanksMessage::all()->sortByDesc('id')->take(5);
    }

    public function render()
    {
        // dd(ThanksMessage::all()->sortByDesc('id'));
        return view(
            'livewire.thanks-messages-index',
            ["thanks_messages" => ThanksMessage::all()]
        );
    }
}