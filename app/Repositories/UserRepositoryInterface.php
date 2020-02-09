<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function getStartsWith($attr, $val);
}