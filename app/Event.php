<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['name', 'description', 'startDate', 'endDate', 'isActivity', 'seatsAvailable', 'edition_id'];

    public function edition() {
        return $this->belongsTo('App\Edition');
    }

    public function speakers() {
    	return $this->belongsToMany('App\User', 'events_speaker');
    }

    public function attendants() {
    	return $this->belongsToMany('App\User', 'events_attendant');
    }

    public function setStartDateAttribute($value) {
        $this->attributes['startDate'] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d H:i:s');
    }

    public function setEndDateAttribute($value) {
        if($value == ""){
            $this->attributes['endDate'] = null;
        }
        else {
            $this->attributes['endDate'] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d H:i:s');
        }
    }

    public function setSeatsAvailableAttribute($value) {
        if($value == ""){
            $this->attributes['seatsAvailable'] = null;
        }
    }
}
