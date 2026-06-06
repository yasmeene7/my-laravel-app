<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {

        $users = User::all();
        return view('users', compact('users'));
    }

    public function create(Request $request) {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt('123456')
        ]);
        return redirect()->back();
    }


    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('edit_user', compact('user'));
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        return redirect('/users');
    }
}
