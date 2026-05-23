<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about',function(){
    $name="Yasmeen";
    $departments=[
        '1'=> 'Tichnical',
        '2'=>'Financial',
        '3'=>'Sales'
     ];

    return view('about',data:compact('name','departments'));

});

Route::post('/about',function(){
     $name= $_POST['name'];
     $departments=[
        '1'=> 'Tichnical',
        '2'=>'Financial',
        '3'=>'Sales'
     ];
return view('about',data:compact('name','departments'));


});

Route::get('tasks',function(){

return view('tasks');

});


route::post('create',function(){
    $task_name=$_POST['name'];
    DB::table('tasks')->insert(['name'=>$task_name]);
    return view('tasks');
});
