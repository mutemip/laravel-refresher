<div>
    <h1>List of all tasks!</h1>
</div>

<div>
    <!-- @if (count($tasks))
        @foreach ($tasks as $task)
            <div>{{ $task -> title}}</div>
        @endforeach  
    @else
        <div>There are no tasks yet.</div>
    @endif -->
    @forelse ($tasks as $task)
        <div>{{$task->title}}</div>
    @empty
        <div>No tasks</div>
    @endforelse
</div>