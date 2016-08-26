<?php

namespace App\Repositories;

use SebastianBerc\Repositories\Repository;
use App\Models\User;

class UserRepository extends Repository
{
    public function takeModel()
    {
        return User::class;
    }
}
