<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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
Route::get('/', [TodoController::class, 'index'])->name('todo.index')->middleware('auth');
Route::post('/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/update', [TodoController::class, 'update'])->name('todo.update');
Route::post('/delete', [TodoController::class, 'delete'])->name('todo.delete');
Route::get('/find', [TodoController::class, 'find'])->name('todo.find')->middleware('auth');
Route::post('/search', [TodoController::class, 'search'])->name('todo.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
