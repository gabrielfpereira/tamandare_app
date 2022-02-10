<div class="pt-3">

    @if (session()->has('message'))
        <div class=" bg-yellow-100 p-2 mx-8 my-2">{{session('message')}}</div>
    @endif
    <div class="gf mx-8 mb-3 pt-3">
        <select wire:model="turmaSelect.turma" class="w-full mb-2" name="turma" id="turma">
            <option value="null" selected>Selecione a turma</option>
            @foreach ($turmas as $turma)
                <option value="{{$turma}}">{{$turma}}</option>
            @endforeach
        </select>
    
        <input wire:model="turmaSelect.quantidade" class="w-full mb-2" type="number" placeholder="quantidade">
    
        <button wire:click="addTurma" class="w-full mb-2 bg-green-600 p-2 rounded text-white">OK</button>
    </div>

</div>