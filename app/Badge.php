<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $table = 'badges';

    protected $fillable = ['name', 'description', 'imgPath', 'edition_id'];

    public function users() {
        return $this->belongsToMany('App\User', 'badge_user')->withTimeStamps();
    }

    public function editions() {
    	return $this->belongsToMany('App\Edition', 'badge_edition')->withTimeStamps();
    }
}
