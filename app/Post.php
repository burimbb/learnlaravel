<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($post) {
            $post->adjust();
        });
    }

    protected $fillable = ['title', 'body', 'active'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function adjust($userId = 1)
    {
        $userId = $userId ?: auth()->id();

        $dirty = $this->getDirty();

        $this->adjustments()->attach($userId, [
            'before' => json_encode(array_intersect_key($this->fresh()->toArray(), $dirty)),
            'after' => json_encode($dirty)
        ]);
    }

    public function adjustments()
    {
        return $this->belongsToMany(User::class, 'adjustments')
            ->withPivot(['before', 'after'])
            ->withTimestamps();
    }
}
