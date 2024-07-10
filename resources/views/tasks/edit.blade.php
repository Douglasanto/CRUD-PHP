@extends('layout.app')

@section('content')
<main class="container">
    <section>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Voltar</a>
        <form method="post" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data"
            class="forms-create">
            @csrf
            @method('PUT')
            <div>
                <h1>Edite a tarefa</h1>
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
                    <label>Name</label>
                    <input type="text" name="name" value="{{$task->name}}">
                    <label>Description</label>
                    <textarea cols="10" rows="5" name="description"
                        value="{{$task->description}}">{{$task->description}}</textarea>
                    <label>Date:</label>
                    <input type="date" name="date" value="{{$task->date}}">
                </div>
            </div>
            <div class="titlebar">
                <input type="hidden" name="hidden_id" value="{{ $task->id }}">
                <button class="btn btn-primary">save</button>
            </div>
        </form>
    </section>
</main>
@endsection