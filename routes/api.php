<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\JointableController;


Route::prefix('users')->group(function () {
    
    Route::get('', [UserController::class, 'index']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::post('', [UserController::class, 'store']);
    Route::put('{id}', [UserController::class, 'update'])->middleware('check.uuid');
    Route::delete('{id}', [UserController::class, 'destroy']);
    Route::get('{id}/userTasks', [UserController::class, 'showTasks']);
    Route::get('{id}/tasks', [TaskController::class, 'index']);
});

