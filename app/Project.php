<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // use $fillable - the fields to send || $guarded - except everything except these fields(ANTI)
    protected $fillable = [

        'title', 'description'

    ];

    public function tasks()
    {

        return $this->hasMany(Task::class);

    }

    public function addTask($task)
    {

        $this->tasks()->create($task);

    }
}
