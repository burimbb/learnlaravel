<?php

namespace App\Mixins;

class StrMixins
{
    public function partNumber()
    {
        return function ($nr) {
            return 'AB-' . substr($nr, 0, 3) . '-' . substr($nr, 3);
        };
    }

    public function prefix()
    {
        return function ($string, $prefix = 'AB-') {
            return $prefix . $string;
        };
    }
}