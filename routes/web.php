<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix => tasks'], function () {

    Route::get('/', [TaskController::class, 'index'])->name('tasksIndex');
    Route::post('/store', [TaskController::class, 'store'])->name('taskStore');
    Route::delete('/destroy/{id}', [TaskController::class, 'destroy'])->name('taskdestroy');
    Route::post('/edite/{id}', [TaskController::class, 'edite'])->name('tasksedite');
    Route::patch('/update/{id}', [TaskController::class, 'update'])->name('taskUpdate');
});
