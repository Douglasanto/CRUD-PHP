@extends('layout.app')

@section('content')
<main class="container">
    <section>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Voltar</a>

        <form method="post" action="{{ route('tasks.store') }}" enctype="multipart/form-data" class="forms-create">
            @csrf
            <div>
                <h1>Adicionar tarefa</h1>
            </div>
            @if ($errors->any)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div>
                    <label>Nome</label>
                    <input type="text" name="name">
                    <label>Descrição</label>
                    <textarea cols="10" rows="5" name="description"></textarea>
                    <label>Data:</label>
                    <input type="date" name="date">
                </div>
            </div>
            <button type="submit" class="btn ">Adicionar</button>
        </form>
    </section>
</main>
@endsection