<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadTrip extends Model
{
    //
    protected $table = 'roadtrips';

    protected $fillable = ['location', 'institution', 'password', 'date', 'roadshowId'];

    public function roadshow(){
        return $this->belongsToMany('App\Roadshow');
    }

    public function setPasswordAttribute($value) {

        if($value != ""){
            $this->attributes['password'] = $value;
        }
    }
}
