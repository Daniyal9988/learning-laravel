<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Models\Task;
use \App\Http\Requests\TaskRequest;
use \App\Http\Controllers\TaskController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/taks');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/taks', [TaskController::class, 'showtaks'])->middleware('auth')->name('tasks.index');
Route::get('/taks/{task}',[TaskController::class, 'taskwithid'])->middleware('auth')->name('tasks.show');
Route::get('/taks/{task}/edit',[TaskController::class, 'edittask'])->middleware('auth')->name('tasks.edit');
Route::post('/tasks' ,[TaskController::class, 'createtask'])->middleware('auth')->name('tasks.store');
Route::put('/tasks{task}' , [TaskController::class, 'updatetask'])->middleware('auth')->name('tasks.update');

// Auth::routes();




Route::view('/tasks/create' , 'create')->middleware('auth')
->name('tasks.create');
