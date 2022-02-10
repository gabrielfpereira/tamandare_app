<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ButtonCheck extends Component
{
    public $status=0;
    public $color;

    public function render()
    {
        return view('livewire.button-check');
    }

    public function verifyStatus()
    {
        $this->status++;

        if($this->status > 2){
            $this->status = 0;
        }

        if($this->status == 0){
            $this->color = "bg-white";
        }

        if($this->status == 1){
            $this->color = "bg-yellow-400";
        }

        if($this->status == 2){
            $this->color = "bg-green-400";
        }
    }
}
