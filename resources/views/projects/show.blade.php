
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">{{ __('Show Projects') }}</div>

                <div class="card-header">
                    <p> {{ $project->title }} :  {{ $project->description }}</p>
                </div>



            <div class="field">
                <div class="control">
                    <a class="btn btn-info" href="/projects/{{ $project->id }}/edit">Edit Project</a>
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
                            <p>{{ $task->description }} </p>{{ $task->id }}
                        </label>
                    </form>
                </div>
                @endforeach

            </div>    
            @endif


            </div>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {{-- add a new task --}}

                <form class="box" method="POST" action="/projects/{{ $project->id }}/tasks">

                    @csrf
                    
                    <div class="field">
                        <div class="card-header">{{ __('New Task') }}</div>


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
            </div>
        </div>
    </div>
</div>

@endsection