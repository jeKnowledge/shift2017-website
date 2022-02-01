<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shifter extends Model
{
    protected $fillable = [
        'student', 'age', 'university', 'course', 'institution', 'bio' , 'twitter', 'github', 'website', 'location', 'role', 'type', 'user_id', 'allowPartners',
    ];

    protected $table = 'shifters';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function ownedTeams() {
        return $this->hasMany('App\Team');
    }

    public function team() {
        return $this->belongsToMany('App\Team', 'team_shifter', 'shifter_id', 'team_id');
    }

    public function application() {
        return $this->hasOne('App\Application', 'shifter_id');
    }
}
