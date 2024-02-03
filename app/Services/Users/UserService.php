<?php

namespace App\Services\Users;

use App\Models\User;

class UserService
{
    public function getUsersByType($userType, $perPage = 10)
    {
        return User::where('type', $userType)->paginate($perPage);
    }
}
