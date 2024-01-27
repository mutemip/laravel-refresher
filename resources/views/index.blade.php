@extends('layouts.app')


@section("title", "List of all tasks")


@section("content")
    <!-- @if (count($tasks))
        @foreach ($tasks as $task)
            <div>{{ $task -> title}}</div>
        @endforeach  
    @else
        <div>There are no tasks yet.</div>
    @endif -->
    
    @forelse ($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['id'=>$task->id]) }}">{{$task->title}}</a>
        </div>
    @empty
        <div>No tasks</div>
    @endforelse

@endsection