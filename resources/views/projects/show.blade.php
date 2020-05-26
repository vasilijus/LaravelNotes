@extends('layout')

@section('content')
    <h1 class="title">Show Project</h1>

    <p> {{ $project->title }}   </p>
    <p> {{ $project->description }}</p>
    
    
    <div class="field">
        <div class="control">
            <a href="/projects/{{ $project->id }}/edit"><button>Edit Project</button></a>
        </div>
    </div>


    @if ($project->tasks->count())
    <div class="box">
    
        <h2 class="title">Task List</h2>

        @foreach( $project->tasks as $task)
        <div>

            <form method="POST" action="/completed-tasks/{{ $task->id }}">

                @if ($task->completed)
                    @method('DELETE')
                @endif

                @csrf

                <label class="checkbox {{ $task->completed ? 'is-complete':''}}"  for="completed">
                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''}} >
                    {{ $task->id }} @ {{ $task->created_at }}
                    <p>{{ $task->description }} </p>
                </label>
            </form>
        </div>
        @endforeach
    
    </div>    
    @endif



    {{-- add a new task --}}
    
    <form class="box" method="POST" action="/projects/{{ $project->id }}/tasks">

        @csrf
        
        <div class="field">
            <label class="label" for="description"> New Task </label>

            <div class="control">

                <input type="text" class="input" name="description" placeholder="New Task" required>

            </div>
        </div>

        <div class="field">

            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
            
        </div>


        @include ('reusable_components.errors')

    </form>
    <br />
@endsection