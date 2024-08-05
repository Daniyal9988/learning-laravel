
{{-- @isset($name)
Hello {{$name}}
@endisset


hello --}}
<h1>List of Tasks</h1>


<div>
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
</div>
