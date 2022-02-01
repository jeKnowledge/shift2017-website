<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = ['name', 'description', 'repository', 'team_id'];

    public function team() {
        return $this->belongsTo('App\Team');
    }

    public function contests() {
    	return $this->belongsToMany('App\Contests', 'contest_project');
    }
}
