<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function index() {
        // تم تعديل اسم الجدول هنا ليتوافق مع قاعدة بياناتك الحقيقية
        $tasks = DB::table('tasks_tabel')->get();
        return view('tasks', compact('tasks'));
    }
    public function create(Request $request) {
        // قراءة البيانات بطريقة لارافيل الرسمية والآمنة
        $task_name = $request->input('name');

        DB::table('tasks_tabel')->insert([
            'name' => $task_name
        ]);

        return redirect()->back();
    }

    public function destroy($id) {
        DB::table('tasks_tabel')->where('id', $id)->delete();
        return redirect('/tasks')->with('success', 'Task deleted successfully');
    }

    public function edit($id) {
        $task = DB::table('tasks_tabel')->where('id', $id)->first();

        if (!$task) {
            return redirect('/tasks');
        }

        return view('edit', compact('task'));
    }

    public function update(Request $request, $id) {
        $new_name = $request->input('name');

        DB::table('tasks_tabel')->where('id', $id)->update([
            'name' => $new_name
        ]);

        return redirect('/tasks')->with('success', 'Task updated successfully');
    }
}
