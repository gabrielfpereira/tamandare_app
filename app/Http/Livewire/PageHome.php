<?php

namespace App\Http\Livewire;

use App\Models\Contador;
use Illuminate\Support\Facades\Auth;
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
        $this->turmas = Contador::whereDate('created_at', $this->filterDate)->orderBy('turma','ASC')->get();
        $this->somar();
        return view('livewire.page-home')->layout('layouts.guest');
    }

    

    public function atualizar($turma)
    {  
            if ($this->validarTurmaExiste($turma)){
                if(Auth::user()->can('update', $this->turmas[$this->keyUpdate])){
                    Contador::where('turma',$turma['turma'])->update($turma);
                    session()->flash('message', "turma: ".$turma['turma']." atualizada.");
                    $this->turmas[$this->keyUpdate]['quantidade'] = $turma['quantidade'];
                } else {
                    session()->flash('message', "Você não permissão para alterar.");
                }                
            } else {
                $turma['user_id'] = auth()->user()->id;
                $turma['created_at'] = $this->filterDate;
                Contador::create($turma);
                $this->turmas[] = $turma;   
                session()->flash('message', "turma: ".$turma['turma']." inserida.");         
            }
                

        $this->somar();
    }

    public function validarTurmaExiste($data)
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
