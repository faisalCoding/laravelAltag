<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GoogleSheet extends Component
{

    public function render()
    {
        return view('livewire.google-sheet');
    }

    public function setGoogleData($arr)
    {
        $this->emit('set-google-data',$arr);
        
    }

}
