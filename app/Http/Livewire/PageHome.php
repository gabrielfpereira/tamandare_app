<?php

namespace App\Http\Livewire;

use App\Models\Contador;
use Livewire\Component;

class PageHome extends Component
{
    public $total=0;
    public $keyUpdate=null;
    public $turmas=[];
    public $list=[''];
    public $filterDate;
    protected $listeners = ['atualizarsoma'=> 'atualizar'];
    

    public function render()
    {
        $this->filterDate = $this->filterDate ?? now()->format('Y-m-d');
        $this->turmas = Contador::whereDate('created_at', $this->filterDate)->get();
        $this->somar();
        return view('livewire.page-home')->layout('layouts.guest');
    }

    

    public function atualizar($turma)
    {  
            if ($this->validarTurma($turma)){
                Contador::where('turma',$turma['turma'])->update($turma);
                $this->turmas[$this->keyUpdate]['quantidade'] = $turma['quantidade'];
            } else {
                Contador::create($turma);
                $this->turmas[] = $turma;            
            }
                

        $this->somar();
    }

    public function validarTurma($data)
    {
        foreach ($this->turmas as $index => $item){
            if ($item['turma'] == $data['turma']){
                $this->keyUpdate = $index;
                return true;
            }
        }
    }

    public function somar()
    {
        //dd($this->turmas);
        $result=0;
        foreach ($this->turmas as $turma){
            $result += $turma['quantidade'];
        }

        $this->total = $result;
    }

    public function deletar($index, $turma_id)
    {
        Contador::find($turma_id)->delete();
        unset($this->turmas[$index]);
        $this->somar();
    }
}
