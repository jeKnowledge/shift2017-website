<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faqs';

    protected $fillable = ['question', 'answer'];

    public function edition() {
        return $this->belongsToMany('App\Edition', 'faq_edition');
    }
}
