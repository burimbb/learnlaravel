<?php

namespace App;

class Postcard
{
    public static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments)
    {
        /* dd(app()->make('Postcard')); */
        /* dd(app()['App\PostCardSendingService']); */
        return (self::resolveFacade('Postcard'))
                ->$method(...$arguments);
    }
}
