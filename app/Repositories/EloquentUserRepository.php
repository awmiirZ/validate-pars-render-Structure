<?php
namespace App\Repositories;

use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    public function createUser(array $userData)
    {
        return User::create($userData);
    }
}
