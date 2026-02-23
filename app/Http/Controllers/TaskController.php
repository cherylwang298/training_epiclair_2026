<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); 
        // return view('tugas.tugas', data: compact('tasks')); 
        return view('tugas.tugas', [
            'tasks' => $tasks,
            'task' => null,
            'title' => 'Add Task'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'matkul' => 'required',
            'tugas' => 'required',
            'deadline' => 'required|date',
        ]);

        Task::create($request->all());
        return redirect('/tugas')->with('success', 'Tugas baru berhasil dicatat!');
    }

    public function destroy(Task $tuga) 
    {
        $tuga->delete();
        return redirect('/tugas')->with('success', 'Tugas berhasil dihapus!');
    }

    public function edit(Task $tuga)
    {
        $tasks = Task::all();
        return view('tugas.tugas', [
            'tasks' => $tasks,
            'task' => $tuga,
            'title' => 'Edit Task'
        ]);
    }

    public function update(Request $request, Task $tuga)
    {
        $request->validate([
            'matkul' => 'required',
            'tugas' => 'required',
            'deadline' => 'required|date',
        ]);

        $tuga->update($request->all());

        return redirect('/tugas')->with('success', 'Tugas berhasil diperbarui!');
    }
}
