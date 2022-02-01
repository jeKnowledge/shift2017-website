<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $table = 'editions';

    protected $fillable = ['year', 'active'];

    public function contests() {
    	return $this->hasMany('App\Contest');
    }

    public function partners() {
    	return $this->hasMany('App\Partner');
    }

    public function events() {
    	return $this->hasMany('App\Event');
    }

    public function applications() {
        return $this->hasMany('App\Application');
    }

    public function roadshows() {
        return $this->hasMany('App\Roadshow');
    }

    public function badges() {
        return $this->belongsToMany('App\Badge', 'badge_edition'); //não devia ser hasMany();
    }

    public function faqs() {
        return $this->belongsToMany('App\FAQ', 'faq_edition', 'edition_id', 'faq_id');
    }
}
