<?php

namespace App\Http\Livewire;

use App\Models\ThanksMessage;
use Livewire\Component;

class ThanksMessageIndex extends Component
{
    public $thanksMessage;

    public function mount(ThanksMessage $thanksMessage)
    {
        $this->thanksMessage = $thanksMessage;
    }

    public function render()
    {
        return view('livewire.thanks-message-index');
    }
}