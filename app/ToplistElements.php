<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToplistElements extends Model
{
    protected $fillable = ['toplist_id', 'name', 'photo'];

    public function toplist(){
        return $this->belongsTo('App\Toplist');
    }

    public function vote(){
        return $this->hasMany('App\vote');
    }
}
