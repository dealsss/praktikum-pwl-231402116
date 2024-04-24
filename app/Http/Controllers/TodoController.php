<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        
        $tasks = Task::all();

        return view('basic', [
            'tasks' => $tasks,
        ]);
    }

    public function tambah(Request $request) {
        
        $request-> validate(
            [
            'task' => 'required|min:5',
            ],
            [
                'task.required' => 'Tugas harus diisi ',
                'task.min' => 'Tugas minimal 5 karakter'
            ]);
    
        Task::create([
            'task' => $request -> task,
            'tanggal' => NOW(),
        ]);
        
        return redirect('/');
    }

    public function destroy(Task $task) {
        Task::destroy($task->id);

        return redirect('/');
    }
}
