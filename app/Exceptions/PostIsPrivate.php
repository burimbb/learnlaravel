<?php

namespace App\Exceptions;

use Exception;

class PostIsPrivate extends Exception
{
    /**
     * Create new public function
     */
    public function render()
    {
        return redirect('/test');
    }
}
