<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id){
    return view('show', [
        'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');

/* Route::get('/hello', function(){
    return 'Hello World';
})->name('hello');

Route::get('/hallo', function(){
    return redirect()->route('hello');
});

Route::get('/greet/{name}', function($name){
    return 'Hello ' . $name . '!';
}); */

Route::fallback(function(){
    return '404 Not Found. KEKE';
});

//use php artisan route:list to see the list of routes
