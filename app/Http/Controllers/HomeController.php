<?php

namespace App\Http\Controllers;
use \App\Models\Task;
use Illuminate\Http\Request;
use \App\Http\Requests\TaskRequest;

class HomeController extends Controller
{
    public function home ()
    {
       // return redirect()->route('tasks.index'); // return to_route('tas)
       return to_route('tasks.index');
    }

    public function showTasks()
    {
        
            return view('index'
            ,
            [
                'tasks' => 
                // \App\Models\Task::all()
                // \App\Models\Task::latest()->where('completed' ,  true)->get()
                Task::latest()->get()
            ]
        );
    
    }

    public function TaskWithId(Task $task) {
    
        return view('show', 
    [ 'task' => $task]
    );
    }


    public function editTask (Task $task) {
    
        return view('edit', 
        [ 'task' => $task]
    );
    }

   public function createTask(TaskRequest $request){
        $task = Task::create($request->validated());
    
    
        return redirect()->route('tasks.show' , ['task' => $task->id])
        ->with('sucess' , 'Task craeted sucessfully ');
    }

    public function updateTask(Task $task, TaskRequest $request){
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
