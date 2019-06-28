<?php

namespace App\Repository;

use App\Models\Users\User;

class UserRepository extends Repository
{
    public function model()
    {
        return User::class;
    }
}
