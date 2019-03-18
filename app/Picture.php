<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'title',
        'path',
    ];

    public function gallery() {
        return $this->belongsTo('App\Gallery');
    }
}
