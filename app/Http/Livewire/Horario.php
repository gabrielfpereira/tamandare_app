<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Horario extends Component
{
    public $turmas= ['1201','1202','1203','1204','2201','2202','2203'];
    public $ambientes = ['sala 1','quadra','sala 19','piscina 1'];
    public $professores = ['Gabriel','Aline','Raquel'];
    public $disciplina = ['Portugues','Ed. Fisica','Matemática'];
    public $professor_disciplina = [
        ['professor'=> 1, 'disciplina'=> 1],
        ['professor'=> 2, 'disciplina'=> 2],
        ['professor'=> 3, 'disciplina'=> 3],
    ];
    public function render()
    {
        return view('livewire.horario');
    }
}
