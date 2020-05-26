
@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

            <div class="card-header">{{ __('Create Projects') }}</div>


            <div class="content">
     

                <form method="POST" action="/projects">
                
                    {{ csrf_field() }}
                    
                    
                    <div class="field">
                        <div class="control">
                        <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Title" />
                        </div>
                    </div>
                    
                    <div class="field">
                        <div class="control">
                        <textarea name="description" placeholder="Desc"  ></textarea>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="btn-primary" type="submit">Add Project</button>
                        </div>
                    </div>

                    @include ('reusable_components.errors')

                </form>
               
            </div>
        </div>


    </div>
</div>

<br>






@endsection