<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Tarefa adicionada com sucesso!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $task->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Tarefa deletada com sucesso!');
    }
}
