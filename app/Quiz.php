<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
    protected $table = 'quizes';

    protected $fillable = ['roadshow_id'];

    public function roadshow(){
        return $this->belongsToMany('App\Roadshow');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
