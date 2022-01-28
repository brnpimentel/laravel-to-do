<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoItemController;

//Login Routes
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//App Routes
Route::group(['middleware' => 'auth', 'as' => 'todos.'], function () {
    Route::get('/', [TodoController::class, 'index'])->name('index');
    
    Route::post('/', [TodoController::class, 'store'])->name('store');
    
    Route::put('/{todo}', [TodoController::class, 'update'])->name('update');
    Route::get('/{todo}/delete', [TodoController::class, 'delete'])->name('delete');
    Route::post('/{todo}', [TodoItemController::class, 'store'])->name('items.store');
    Route::put('/{todo}/{todo_item}', [TodoItemController::class, 'update'])->name('items.update');
    Route::get('/{todo}/{todo_item}/delete', [TodoItemController::class, 'delete'])->name('items.delete');
    Route::get('/{todo}/{todo_item}/toggle', [TodoItemController::class, 'toggle'])->name('items.toggle');
});
