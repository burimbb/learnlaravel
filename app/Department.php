<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function lecturers()
    {
       return $this->hasMany('App\Lecturer');
    }
    
    /**
     * Create new public function
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = '['. rand(0,1000) .']-'.$value;
    }

    /**
     * Create new public function
     */
    public function getNameAttribute($value)
    {
        return '[Getting]-'.$value;
    }
}
