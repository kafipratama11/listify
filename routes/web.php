<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/signup', function () {
    return view('signup');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['Login'])->group(function(){
    Route::get('/task', [TaskController::class, 'index'])->name('task');
    Route::get('/archive', [ArchiveController::class, 'index'])->name('archive');
    Route::post('/task/store', [TaskController::class, 'store'])->name('task-store');
    Route::patch('/task/update-status/{id}', [TaskController::class, 'updateStatus'])->name('task.updateStatus');
    Route::patch('/task/update-status-todo/{id}', [TaskController::class, 'updateStatusTodo'])->name('task.updateStatusTodo');
    Route::patch('/task/update-status-inprogress/{id}', [TaskController::class, 'updateStatusInProgress'])->name('task.updateStatusInProgress');
    Route::patch('/task/update-status-done/{id}', [TaskController::class, 'updateStatusDone'])->name('task.updateStatusDone');
    Route::get('/task/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::delete('/task/destroy-todo/{id}', [TaskController::class, 'destroyTodo'])->name('task.destroy.todo');
    Route::delete('/task/destroy-inprogress/{id}', [TaskController::class, 'destroyInProgress'])->name('task.destroy.inprogress');
    Route::delete('/task/destroy-done/{id}', [TaskController::class, 'destroyDone'])->name('task.destroy.done');
    Route::delete('/task/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});
