
{{-- @isset($name)
Hello {{$name}}
@endisset


hello --}}

@extends('layouts.app')



@section('title', 'List of Tasks')

@section('content')

    {{-- @if (count($tasks))
    @foreach ($tasks as $task)
     <div>{{$task->title}} </div>   
    @endforeach
    
    @endif --}}

@forelse ($tasks as $task)
{{-- <div>{{$task->title}} </div> --}}
<a href="{{ route ('tasks.show' , ['id' => $task->id])}}">{{$task->title}}</a></br>
@empty
   <div>hello</div> 
@endforelse
@endsection