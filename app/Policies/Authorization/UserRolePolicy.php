<?php

namespace App\Policies\Authorization;

use App\Models\User;

class UserRolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function assignRole(User $user): bool
    {
        return $user->hasPermissionTo('edit users');
    }

    public function syncRoles(User $user): bool
    {
        return $user->hasPermissionTo('edit users');
    }
}
