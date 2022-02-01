<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roadshow extends Model
{
    //
    protected $table = 'roadshows';

    protected $fillable = ['edition_id'];

    public function quiz(){
        return $this->hasMany('App\Quiz');
    }

    public function roadtrips(){
        return $this->hasMany('App\RoadTrip');
    }

    public function editions() {
        return $this->belongsToMany('App\Edition');
    }
}
