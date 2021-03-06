<?php

use App\Http\Controllers\{TaskController, TaskStatusController, LabelController};
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('task_statuses', TaskStatusController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('tasks', TaskController::class);

Route::resource('labels', LabelController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
