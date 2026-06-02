<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // 1. استعراض المستخدمين
    public function index() {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }

    // 2. إضافة مستخدم جديد
    public function create(Request $request) {
        $user_name = $request->input('name');
        $user_email = $request->input('email'); // أضفنا الإيميل لأن جدول الـ users يحتاجه أساساً

        DB::table('users')->insert([
            'name' => $user_name,
            'email' => $user_email,
            'password' => bcrypt('123456') // كلمة مرور افتراضية مشفرة لتجنب مشاكل قاعدة البيانات
        ]);

        return redirect()->back();
    }

    // 3. حذف مستخدم
    public function destroy($id) {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users');
    }

    // 4. عرض صفحة تعديل المستخدم
    public function edit($id) {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            return redirect('/users');
        }
        return view('edit_user', compact('user'));
    }

    // 5. تحديث بيانات المستخدم
    public function update(Request $request, $id) {
        $new_name = $request->input('name');
        $new_email = $request->input('email');

        DB::table('users')->where('id', $id)->update([
            'name' => $new_name,
            'email' => $new_email
        ]);

        return redirect('/users');
    }
}
