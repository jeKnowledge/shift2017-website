<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    protected $fillable = ['name', 'logoPath', 'website', 'type', 'edition_id'];

    public function editions() {
        return $this->belongsToMany('App\Edition');
    }

    public function users() {
    	return $this->hasMany('App\User');
    }
}
