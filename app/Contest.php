<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contests';

    protected $fillable = ['name', 'description', 'partner_id', 'edition_id'];

    public function projects() {
        return $this->hasMany('App\Project');
    }

    public function edition() {
        return $this->belongsTo('App\Edition');
    }
}
