<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $guarded = [];

    public function department()
    {
       return $this->belongsTo('App\Department');
    }

    public function degree()
    {
       return $this->belongsTo('App\Degree');
    }
}
