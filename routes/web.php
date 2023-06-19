<?php

use Illuminate\Support\Facades\Route;
use App\User;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/login', [userController::class, 'loginAction'])->name('login');
// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
// Auth::routes();

Route::group(['middleware' => ['auth']], function() {
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
Route::POST('/save', [App\Http\Controllers\TaskController::class, 'store'])->name('save');
Route::PUT('/taskprogress/{id}', [App\Http\Controllers\TaskController::class, 'progressupdate'])->name('taskprogress');
Route::get('/taskedit/{id}', [App\Http\Controllers\TaskController::class, 'taskedit'])->name('taskedit');
Route::PUT('Task Edit/{id}', [App\Http\Controllers\TaskController::class, 'taskupdate'])->name('taskupdate');
Route::DELETE('/Task/delete/{id}', [App\Http\Controllers\TaskController::class, 'taskdestroy'])->name('taskdestroy');
   
});

Route::any('{url}', function(){
    return redirect('/');
})->where('url', '.*');