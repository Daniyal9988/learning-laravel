<?php

namespace App\Http\Controllers;
use \App\Models\Task;
use Illuminate\Http\Request;
use \App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function home ()
    {
       // return redirect()->route('tasks.index'); // return to_route('tas)
       return to_route('tasks.index');
    }

    // public function showtaks()
    // {
        
    //         return view('dashboard'
    //         ,
    //         [
    //             'tasks' => 
    //             // \App\Models\Task::all()
    //             // \App\Models\Task::latest()->where('completed' ,  true)->get()
    //             Task::latest()->get()
    //         ]
    //     );
    
    // }


    public function showtaks()
{

    $user = auth()->user();
    $tasks = $user->tasks;

    // dd($tasks);

    // Get the currently authenticated user's email
    //$userEmail = auth()->user()->email;

    // Fetch tasks for the authenticated user
    // $tasks = Task::latest()
    //              ->where('email', $userEmail)
    //              ->get();

                 //$tasks = Task::where('email', $userEmail)->get();
    // Pass the tasks to the view
    return view('dashboard', [
        'tasks' => $tasks
    ]);
}


    public function taskwithid(Task $task) {
    
        return view('show', 
    [ 'task' => $task]
    );
    }


    public function edittask (Task $task) {
    
        return view('edit', 
        [ 'task' => $task]
    );
    }

   public function createtask(TaskRequest $request){
        // $task = Task::create($request->validated());
    
    
        // return redirect()->route('tasks.show' , ['task' => $task->id])
        // ->with('sucess' , 'Task craeted sucessfully ');

        $data = $request->validated();
        $data['email'] = auth()->user()->email; // Set the email field to the currently logged-in user's email
    
        // Create the task
        $task = Task::create($data);
    
        return redirect()->route('tasks.show', ['task' => $task->id])
                         ->with('success', 'Task created successfully');
    }

    public function updatetask(Task $task, TaskRequest $request){
        // $data = $request->validated();
    
        // $task->title = $data['title'];
        // $task->description = $data['description'];
        // $task->long_description = $data['long_description'];
        // $task->save();
        $task->update($request->validated());
    
        return redirect()->route('tasks.show' , ['task' => $task->id])
        ->with('sucess' , 'Task Updated sucessfully ');
    }
}
