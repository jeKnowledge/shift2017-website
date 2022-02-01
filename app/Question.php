<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'questions';

    protected $fillable = ['question', 'answer', 'quiz_id'];

    public function quiz(){
        return $this->belongsToMany('App\Quiz');
    }
}
