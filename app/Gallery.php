<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'name',
    ];

    public function author() {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function pictures() {
        return $this->hasMany('App\Picture');
    }
}
