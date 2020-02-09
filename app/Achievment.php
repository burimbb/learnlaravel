<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievment extends Model
{
    protected $fillable = ['user_id', 'achievment_id'];

    /**
     * Create new public function
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'users_achievments');
    }
}
