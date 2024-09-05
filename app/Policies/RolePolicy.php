<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function access(User $user, $role)
    {
        return $user->role == $role;
    }
}
