<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $guarded = [];

    public function lecturers(){
        return $this->hasMany('App\Lecturer');
    }
}
