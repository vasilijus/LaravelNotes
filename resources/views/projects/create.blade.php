<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
     
    </head>
    <body>


            <div class="content">
                <div class="title m-b-md">
                    Create Project
                </div>

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
                            <button type="submit">Add Project</button>
                        </div>
                    </div>

                    @include ('reusable_components.errors')

                </form>
               
            </div>
        </div>
    </body>
</html>
