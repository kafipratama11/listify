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

Route::post('regiter', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['Login'])->group(function(){
    Route::get('/task', [TaskController::class, 'index'])->name('task');
    Route::get('/archive', [ArchiveController::class, 'index'])->name('archive');
    // page edit
    Route::get('task/{id}', [TaskController::class, 'edit'])->name('task.edit');

    Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
    Route::patch('/task/update/{id}', [TaskController::class, 'update'])->name('task.update');
    // update status
    Route::patch('/task/update-status-list/{id}', [TaskController::class, 'updateStatusList'])->name('task.update.statusList');
    Route::patch('/task/update-status-todo/{id}', [TaskController::class, 'updateStatusTodo'])->name('task.update.statusTodo');
    Route::patch('/task/update-status-onprogress/{id}', [TaskController::class, 'updateStatusOnProgress'])->name('task.update.statusOnProgress');
    Route::patch('/task/update-status-done/{id}', [TaskController::class, 'updateStatusDone'])->name('task.update.statusDone');
    // delete
    Route::delete('/task/delete/list/{id}', [TaskController::class, 'deleteTaskList'])->name('delete.task.list');
    Route::delete('/task/delete/todo/{id}', [TaskController::class, 'deleteTaskTodo'])->name('delete.task.todo');
    Route::delete('/task/delete/onprogress/{id}', [TaskController::class, 'deleteTaskOnProgress'])->name('delete.task.onprogress');
    Route::delete('/task/delete/done/{id}', [TaskController::class, 'deleteTaskDone'])->name('delete.task.done');
    // archive status
    Route::patch('/task/archive-status/{id}', [ArchiveController::class, 'updateArchiveStatus'])->name('archive.status');
    Route::patch('/task/archive-status/active/{id}', [ArchiveController::class, 'updateArchiveStatusActive'])->name('archive.status.active');
});