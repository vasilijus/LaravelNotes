@extends('layout')

@section('content')

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <h2>
                        All Projects
                    </h2>
                </div>

                @foreach ($projects as $project)
                    <li>
                        <div>
                        <a href="{{ url("/projects/{$project->id}")}}" >{{ $project->id }}: {{ $project->title }} </a>
                        <p>{{ $project->description }} Created: {{ $project->created_at->diffForHumans() }}, Updated: {{ $project->updated_at->diffForHumans() }}</p>
                        </div>
                    </li>
                @endforeach

               
            </div>
        </div>
@endsection