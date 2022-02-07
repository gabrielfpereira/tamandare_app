<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TurmaComponent extends Component
{
    public $turmas = ['1201','1202','1203','1204','2201','2202','2203','3201','3202','3203','4201','4202','5201','5202','5203','5204','6201','6202','6203','6204','7201','7202','7203','7204','8201','8202','8203','8204','9201','9202','9203','9204'];
    public $turmaSelect=['turma'=>'', 'quantidade'=>0];
    
    public function render()
    {
        return view('livewire.turma-component');
    }
    
    public function addTurma()
    {
        if($this->validar()){
            $this->emit('atualizarsoma', $this->turmaSelect);
        }
    }

    public function validar()
    {
        if(!$this->turmaSelect['turma']){
            session()->flash('message', 'Selecione uma turma.');
            return false;
        }

        if(!$this->turmaSelect['quantidade']){
            session()->flash('message', 'o atributo quantidade não pode ser vazio.');
            return false;
        }

        return true;
    }
}
