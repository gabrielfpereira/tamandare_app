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
        @if (session()->has('message'))
            <div class=" bg-yellow-100 p-2 mx-8 my-2">{{session('message')}}</div>
        @endif
        <livewire:turma-component />
        <div class="mx-8"><span>Qtde: {{count($turmas)}}</span></div>

        <div class="grid grid-cols-2 gap-2 mx-4">
            @forelse ($turmas as $index => $turma)
                <div class="gf bg-white rounded mt-1 border-b-2 border-cyan-800 px-2 py-2 flex justify-between items-center w-full">
                    <livewire:button-check :wire:key="$index" />
                    <h3>{{$turma['turma']}}: {{$turma['quantidade']}}</h3>
                    @can('delete', $turma)
                        <button wire:click="deletar({{$index}},{{$turma->id}})" class="gf p-1 text-white rounded mr-2">
                            <img class="w-6 h-6 text-gray-50" src="{{asset('img/trash-svgrepo-com.svg')}}" alt="deletar">
                        </button>                        
                    @endcan
                </div>
            @empty
                <p class="bg-white mx-8 rounded mt-4 p-4">Por favor insira a quantidade de alunos nas turmas.</p>
            @endforelse
        </div>
    </div>

</div>
