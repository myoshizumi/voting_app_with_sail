<?php

namespace App\Http\Livewire;

use App\Models\ThanksMessage;
use Livewire\Component;

class ThanksMessagesIndex extends Component
{

    // public $thanksMessage;
    public $thanksMessages;

    // protected $listeners = [
    //     'thanksMessageWasConfirmed'
    // ];

    public function mount(ThanksMessage $thanksMessage)
    {
        // $this->thanksMessage = $thanksMessage;
        $this->thanksMessages = ThanksMessage::all()->sortByDesc('id')->take(5);
    }

    // public function thanksMessageWasConfirmed()
    // {
    //     $this->thanksMessage->refresh();
    // }

    public function render()
    {
        return view(
            'livewire.thanks-messages-index',
            ["thanks_messages" => ThanksMessage::all()]
        );
    }
}