<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}', function ($id){
    return view('show', [
        'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id'=>$task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

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
