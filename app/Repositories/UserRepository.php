<?php

namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Create new public function
     */
    public function insert($attributes)
    {
        \DB::table('users')->insert($attributes);
    }

    public function getAll()
    {
        return User::all();
    }

    public function getStartsWith($attribute, $startsWith)
    {
        return User::where($attribute, 'LIKE', "{$startsWith}%")
                    ->get();
    }

    public function findById($id)
    {
        return User::find($id);
    }
}
