<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['id', 'imageable_id', 'imageable_type', 'url'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
