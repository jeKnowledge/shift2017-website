<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = ['pitch', 'portfolio', 'urls', 'firstTime', 'comments', 'user_id', 'edition_id', 'accepted', 'tshirt'];

    public function shifter() {
        return $this->belongsTo('App\Shifter', 'shifter_id');
    }

    public function edition() {
    	return $this->belongsTo('App\Edition');
    }

    public function skills() {
        return $this->belongsToMany('App\Skill', 'skill_application')->withTimeStamps();
    }

    public function hasSkill($skill) {
        if($this->skills()->count()>0 && $this->skills()->find($skill->id))
            return true;
        else
            return false;
    }
}
