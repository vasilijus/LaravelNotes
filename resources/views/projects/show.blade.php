
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">{{ __('Show Projects') }}</div>

                <div class="card-header">

                    <div class="row">
                        <div class="col">
                            <p> {{ $project->title }} :  {{ $project->description }}</p>
                        </div>
                        <div class="col"></div>
                        <div class="col-4">
                            <a class="btn btn-info float-right" href="/projects/{{ $project->id }}/edit">Edit Project</a>
                        </div>
                    </div>

                </div>


                @if ($project->tasks->count())
                    <div class="box card-body">

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
                                    {{ $task->id }}. <i>Created @: </i> {{ $task->created_at }}
                                    <p> - {{ $task->description }} </p>
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


                        <div class="row control p-3">
                            <div class="col">
                                <input type="text" class="form-control input" name="description" placeholder="New Task" required>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-info float-right" type="submit" class="button is-link">Add Task</button>
                            </div>
                        </div>

                    </div>
                    

                    <!-- <div class="input-group mb-3">
                        <input type="text" class="form-control" 
                        placeholder="New Task" name="description"  aria-label="Recipient's username" aria-describedby="basic-addon2" required>

                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Add Task</button>
                        </div>
                    </div> -->


                    @include ('reusable_components.errors')

                </form>
                <br />
            </div>
        </div>
    </div>
</div>

@endsection