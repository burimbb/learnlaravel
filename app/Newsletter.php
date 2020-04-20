<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    /**
     * Create new public function
     */
    public function subscribeTo($name, $user)
    {
        var_dump("slowing the network");
    }
}
