<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    $name = "Yasmeen";
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales'
    ];
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function(Request $request) {
    $name = $request->input('name');
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales'
    ];
    return view('about', compact('name', 'departments'));
});

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/create', [TaskController::class, 'create']);
Route::delete('/tasks/delete/{id}', [TaskController::class, 'destroy']);
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit']);
Route::put('/tasks/update/{id}', [TaskController::class, 'update']);




// (Users) المطلوبة في الواجب
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'create']);
Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::put('/users/update/{id}', [UserController::class, 'update']);
