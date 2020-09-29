<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::middleware('auth')->group(function(){

    Route::resource('/todo','App\Http\Controllers\TodoController');
    
    Route::put('/todos/{todo}/complete', [App\Http\Controllers\TodoController::class,
    'complete'])->name('todo.complete');

    Route::delete('/todos/{todo}/incomplete', [App\Http\Controllers\TodoController::class,
    'incomplete'])->name('todo.incomplete');

//});



//Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');

//Route::get('/todos/create', [App\Http\Controllers\TodoController::class, 'create']);
//Route::post('/todos/create', [App\Http\Controllers\TodoController::class, 'store']);


//Route::patch('/todos/{todo}/update', [App\Http\Controllers\TodoController::class,
// 'update'])->name('todo.update');



 //Route::delete('/todos/{todo}/delete', [App\Http\Controllers\TodoController::class,
 //'delete'])->name('todo.delete');



//Route::get('/todos/{todo}/edit', [App\Http\Controllers\TodoController::class, 'edit']);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\UserController::class, 'index']);

//Route::get('/home', 'App/Http/Controllers/UserController@index');
Route::post('/upload', [App\Http\Controllers\UserController::class, 'uploadAvatar']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
