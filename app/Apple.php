<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pipeline\Pipeline;

class Apple extends Model
{
    use SoftDeletes;

    public static function allApples()
    {
        return app(Pipeline::class)
                    ->send(Apple::query())
                    ->through([
                        'App\QueryFilters\Active',
                        'App\QueryFilters\Sort',
                        'App\QueryFilters\MaxCount',
                    ])
                    ->thenReturn()
                    ->paginate(5);
    }

    /**
     * Create new public function
     */
    public function publish($note)
    {
        return "Public method: ".$note;
    }
}
