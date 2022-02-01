<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['name', 'shifter_id', 'edition_id', 'logoPath'];

    public function owner() {
    	return $this->belongsTo('App\Shifter', 'shifter_id');
	}
	
    public function shifters() {
        return $this->belongsToMany('App\Shifter', 'team_shifter', 'team_id', 'shifter_id');
    }

    public function project() {
        return $this->hasOne('App\Project');
    }
}
