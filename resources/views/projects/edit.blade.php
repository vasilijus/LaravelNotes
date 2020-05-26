
@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">{{ __('Edit Projects') }}</div>

                <form method="POST" action="/projects/{{ $project->id }} ">

                    {{ method_field('PATCH') }}                
                    {{ csrf_field() }}
                    
                    <div class="field">
                        <div class="control">
                            <input type="text" name="title" placeholder="Title" value="{{ $project->title }}" /><br />
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <textarea name="description" placeholder="Desc"> {{ $project->description }} </textarea>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button type="submit">Update Project</button>
                        </div>
                    </div>

                </form>

                <form method="POST" action="/projects/{{ $project->id }} ">

                    <!-- Simple Syntax -->
                    @method('DELETE')
                    @csrf  

                    <div class="field">
                        <div class="control">
                            <button type="submit">Delete Project</button>
                        </div>
                    </div>

                </form>

               
            </div>
        </div>

    </div>
</div>

<br>

@endsection

