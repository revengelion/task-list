<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return 'Hello World';
})->name('hello');

Route::get('/hallo', function(){
    return redirect()->route('hello');
});

Route::get('/greet/{name}', function($name){
    return 'Hello ' . $name . '!';
});

Route::fallback(function(){
    return '404 Not Found';
});

//use php artisan route:list to see the list of routes
