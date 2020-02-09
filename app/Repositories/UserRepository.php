<?php

namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
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