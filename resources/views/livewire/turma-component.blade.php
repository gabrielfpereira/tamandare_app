<div class="pt-3">

    @if (session()->has('message'))
        <div class=" bg-yellow-100 p-2 mx-8 my-2">{{session('message')}}</div>
    @endif
    <div class="gf mx-8 flex justify-center gap-1 mb-3 pt-3">
        <select wire:model="turmaSelect.turma" name="turma" id="turma">
            <option value="null" selected>Selecione</option>
            @foreach ($turmas as $turma)
                <option value="{{$turma}}">{{$turma}}</option>
            @endforeach
        </select>
    
        <input wire:model="turmaSelect.quantidade" type="number" placeholder="quantidade">
    
        <button wire:click="addTurma" class="gf bg-green-600 p-2 rounded text-white">OK</button>
    </div>
</div>