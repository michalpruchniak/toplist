<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toplist extends Model
{
    protected $fillable  = ['name', 'slug'];

    public function elements(){
        return $this->belongsTo('App\ToplistElements');
    }
}
