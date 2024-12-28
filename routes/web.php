<?php
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

// Grup rute untuk TodoListController
Route::controller(TodoListController::class)->group(function () {
    Route::get('/', 'index')->name('todo.index'); // Rute untuk metode index pada URL /
    Route::resource('todo', TodoListController::class)->except(['index'])->names(['store' => 'todo.store']); // Resource controller tanpa metode index
});
