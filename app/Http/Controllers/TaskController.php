<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // 1. استدعاء الموديل في الأعلى

class TaskController extends Controller
{
    public function index() {
        
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function create(Request $request) {

        Task::create([
            'name' => $request->input('name')
        ]);
        return redirect()->back();
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted successfully');
    }

    public function edit($id) {

        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }


    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);


        $task->update([
            'name' => $request->input('name')
        ]);

        return redirect('/tasks')->with('success', 'Task updated successfully');
    }
}
