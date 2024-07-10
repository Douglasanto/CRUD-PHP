<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="titlebar">
                        <h1>Tarefas</h1>
                        <a href="{{ route('tasks.create') }}" class="btn-link">Adicionar Tarefa</a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="table">
                        <div class="table-product-head">
                            <p>Name</p>
                            <p>Description</p>
                            <p>Date</p>
                            <p>Actions</p>
                        </div>

                        <div class="table-product-body">
                            @forelse ($tasks as $task)
                                <div class="table-product-row">
                                    <p>{{ $task->name }}</p>
                                    <p class="description">{{ $task->description }}</p>
                                    <p>{{ $task->date }}</p>
                                    <div class="btns">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn-primary btn-success">
                                            Editar
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Tem certeza que deseja deletar esta tarefa?')">
                                                Deletar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p>Nenhuma tarefa encontrada.</p>
                            @endforelse
                        </div>

                        <div class="table-paginate">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>