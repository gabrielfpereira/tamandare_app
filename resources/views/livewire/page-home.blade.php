<div class="min-h-screen">
    
    <div class="bg-sky-800  flex justify-between items-center px-3">
        <div class="w-14 h-14">
            <img src="{{asset('logo_tamandare.png')}}" alt="logo_eti_tamandare">
        </div>

        <div>
            <input class="rounded focus:outline-none" wire:model="filterDate" type="date" name="calendario" id="calendario">
        </div>

        <p wire:poll class="text-lg text-white">Total: <span>{{$total}}</span></p>
    </div>

    <div class="mx-auto bg-slate-100 min-h-screen py-2">
        <livewire:turma-component />
        <div class="mx-8"><span>Qtde: {{count($turmas)}}</span></div>
        @forelse ($turmas as $index => $turma)
            <div class="gf bg-white mx-8 rounded mt-4 border-b-2 border-cyan-800 p-4 flex justify-center items-center gap-7">
                <h3>{{$turma['turma']}}: {{$turma['quantidade']}}</h3>
                <button wire:click="deletar({{$index}},{{$turma->id}})" class="gf bg-red-600 p-1 text-white rounded">deletar</button>
            </div>
        @empty
            <p class="bg-white mx-8 rounded mt-4 p-4">Por favor insira a quantidade de alunos nas turmas.</p>
        @endforelse

    </div>

</div>
