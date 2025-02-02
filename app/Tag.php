<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['body'];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
}
