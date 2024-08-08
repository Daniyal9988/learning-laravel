<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        color: #333;
        margin: 0;
        padding: 0;
        /* background-image: url('https://coolbackgrounds.io/images/backgrounds/index/sea-edge-79ab30e2.png');
    background-size: cover;
    background-repeat: no-repeat; 
    background-position: center; */
    }

    .main-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .main-container h3 {
        color: #4b4bd0;
        font-size: 1.5em;
        margin-top: 2em;
        margin-bottom: 0.5em;
        border-bottom: 1px solid #ddd;
        padding-bottom: 0.5em;
    }

    .main-container p {
        font-size: 1.1em;
        line-height: 1.6em;
        margin-bottom: 1.5em;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    .button-container a {
        display: inline-block;
        font-size: 1em;
        color: #007bff;
        text-decoration: none;
        padding: 10px 20px;
        border: 1px solid #007bff;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
        margin: 0 10px;
    }

    .button-container a:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>




<div class="main-container">
    <h3>Title</h3>
    <p>{{ $task->title }}</p>
    
    <h3>Description</h3>
    <p>{{ $task->description }}</p>
    
    <h3>Long Description</h3>
    @if($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif
    
    <h3>Created At</h3>
    <p>{{ $task->created_at }}</p>
    
    <h3>Updated At</h3>
    <p>{{ $task->updated_at }}</p>

    <div class="button-container">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
        <a href="{{ route('tasks.index') }}">Back to Tasks</a>
    </div>
</div>
</x-app-layout>