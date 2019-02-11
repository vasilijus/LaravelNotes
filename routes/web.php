<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// use App\Services\Twitter;

// use App\Repositories\UserRepository;

// Route::get('/' , function(UserRepository $users) {
//     dd($users);
//     return view('welcome');
// });
// Route::get('/' , function( Twitter $twitter) {
//     dd($twitter);
//     return view('welcome');
// });


Route::get('/',         'PagesController@home');
Route::get('/about',    'PagesController@about');
Route::get('/contact',  'PagesController@contact');

// Route::resource('projects', 'ProjectsController');

Route::get('/projects',                 'ProjectsController@index');
Route::get('/projects/create',          'ProjectsController@create');
Route::get('/projects/{project}',       'ProjectsController@show');
Route::post('/projects',                'ProjectsController@store');
Route::get('/projects/{project}/edit',  'ProjectsController@edit');
Route::patch('/projects/{project}',     'ProjectsController@update');
Route::delete('/projects/{project}',    'ProjectsController@destroy');


Route::post('/projects/{project}/tasks','ProjectTasksController@store');

Route::post('/completed-tasks/{task}',  'CompletedTasksController@store');
Route::delete('completed-tasks/{task}', 'CompletedTasksController@destroy');


/* 
    GET     /projects           (index)
    GET     /project/create     (create)
    GET     /project/1          (show)
    POST    /projects           (store)
    GET     /project/1/edit     (edit)
    PATCH   /project/1          (update)
    DELETE  /project/1          (destroy)
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
