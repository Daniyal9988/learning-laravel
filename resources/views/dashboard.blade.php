<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

 
    </x-slot>

    <div class="container">
        <button class="add-button" onclick="window.location.href='{{ route('tasks.create') }}'">Add</button>

        <h1>List of Tasks</h1>

        @forelse ($tasks as $task)
            <div class="main-div">
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                    <p>{{ $task->title }}</p>
                </a>
            </div>
        @empty
            <div class="main-div">
                <p>No tasks available.</p>
            </div>
        @endforelse
    </div>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
          
        }

        h1 {
            text-align: center;
            margin-bottom: 5vh;
            font-size: 2.5em;
            letter-spacing: 0.05em;
            animation: colorChange 5s infinite;
        }

        @keyframes colorChange {
            0% {
                color: #ff0000; /* Red */
            }
            25% {
                color: #ff8000; /* Orange */
            }
            50% {
                color: #009dff; /* Blue */
            }
            75% {
                color: #52b852; /* Green */
            }
            100% {
                color: #4b4bd0; /* Purple */
            }
        }

        .main-div {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2vh;
            padding: 1em;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .main-div:hover {
            transform: translateY(-5px);
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            font-size: 1.2em;
            color: #007bff;
            transition: color 0.2s ease;
        }

        a:hover {
            color: #286fba;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }

        .add-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #218838;
        }
    </style>
</x-app-layout>
