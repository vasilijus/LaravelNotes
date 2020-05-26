<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use \App\Project;


class ProjectsController extends Controller
{
    //
    public function index()
    {
        $projects = \App\Project::all();
        return view('projects.index',[ 'projects'=> $projects]);
        //return view('projects.index', compact('projects'));
    }

    //show              //Better Syntax - Route Model Binding (COuld do that for Edit, Destroy)
    public function show(\App\Project $project)
    {
        // $twitter = app('twitter');

        // dd($twitter);

        return view('projects.show', compact('project'));
    }
    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        request()->all();
        $validatedAttr = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required'
        ]);

        $validatedAttr = array_merge($validatedAttr, ['user_id' => auth()->user()->id]);
        // dd($validatedAttr);
        \App\Project::create( $validatedAttr );
        // $project = new \App\Project();

        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();
        return redirect('/projects');
        //return request()->all();
    }

    //edit
    public function edit($id)
    {
        $project = \App\Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }
    //update
    public function update(\App\Project $project)
    {
        $project->update( request( ['title', 'description'] ) );
        // $project = \App\Project::findOrFail($id);
        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        return redirect('/projects');
    }
    //destroy
    public function destroy($id)
    {
        \App\Project::destroy($id);

        return redirect('/projects');
    }

}
