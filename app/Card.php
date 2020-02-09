<?php

namespace App;

use Illuminate\Support\Facades\Facade;

class Card extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Postcard';
    }
}