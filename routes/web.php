<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Models\Task;
use \App\Http\Requests\TaskRequest;
use \App\Http\Controllers\HomeController;

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

// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];


//named routes 
// Route::get('/danyyy', function () {
//     return 'hello hi hi ';
// })->name('dany');

// Route::get('/greet/{name}', function ($name) {
//     return 'hello'.$name. '!';
// });

// //url redirecting
// Route::get('/hello', function () {
//     return redirect()->route('dany');
// });
// //if no route matches this route matches 
// Route::fallback(function(){
//     return 'you got somewhere my g';
// });

// Route::get('/', function ()  {
//     return redirect()->route('tasks.index');
// })->name('home');





// Route::get('/taks', function () use($tasks) {
//     return view('index'
//     ,
//     [
//         'tasks' => $tasks
//     ]
// );
// })->name('tasks.index');


// Route::get('/taks/{id}',function ($id) use ($tasks){
//     $task = collect($tasks)->firstWhere('id',$id);

//     if(!$task)
//     {
//         return ('task not there');
//     }
//     return view('show', [ 'task' => $task]);

// })->name('tasks.show');



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/taks', [HomeController::class, 'showTasks'])->name('tasks.index');
Route::get('/taks/{task}',[HomeController::class, 'TaskWithId'])->name('tasks.show');
Route::get('/taks/{task}/edit',[HomeController::class, 'editTask'])->name('tasks.edit');
Route::post('/tasks' ,[HomeController::class, 'createTask'])->name('tasks.store');
Route::put('/tasks{task}' , [HomeController::class, 'updateTask'])->name('tasks.update');




Route::view('/tasks/create' , 'create')
->name('tasks.create');





