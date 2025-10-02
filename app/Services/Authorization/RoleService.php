<?php

namespace App\Services\Authorization;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleService
{
    public function createRole(array $data): void
    {
        DB::transaction(function () use ($data) {
            $role = Role::create([
                'name' => $data['name'],
                'guard_name' => 'sanctum'
            ]);

            $role->syncPermissions($data['permissions']);
        });
    }

    public function updateRole(Role $role, array $data): void
    {
        DB::transaction(function () use ($role, $data) {
            $role->name = $data['name'];
            $role->save();

            $role->syncPermissions($data['permissions']);
        });
    }
}
