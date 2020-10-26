@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">{{ __('All Projects') }}</div>

            <!-- {{ $projects }}
            [{
                "id":1,"title":"proj1","description":"qweqweqwe",
                "created_at":"2020-05-26 21:06:39","updated_at":"2020-05-26 21:06:39",
                "user_id":1
            }]  -->
            
            @foreach ($projects as $project)
            <div class="form-group row pt-4">

                <label class="col-md-1 col-form-label text-md-right">{{ $project->id }}</label>
                <div class="col-md-9">
                    <a href="{{ url("/projects/{$project->id}")}}" > 
                        <h2>{{ $project->title }} </h2>
                    </a>
                    <p>
                        {{ $project->description }} Created: {{ $project->created_at->diffForHumans() }}, Updated: {{ $project->updated_at->diffForHumans() }}
                    </p>
                </div>

            </div><hr>
            @endforeach


            </div>
        </div>
    </div>
</div>

@endsection