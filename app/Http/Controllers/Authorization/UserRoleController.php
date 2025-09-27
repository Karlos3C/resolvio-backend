<?php

namespace App\Http\Controllers\Authorization;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authorization\AssignRoleRequest;
use App\Http\Requests\Authorization\SyncRoleRequest;

class UserRoleController extends Controller
{
    public function assignRole(AssignRoleRequest $request, User $user)
    {
        try {
            $data = $request->validated();
            $user->assignRole($data['role_name']);
            return response(['message' => 'Rol asignado al usuario exitosamente'], 200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al asignar el rol al usuario',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function syncRoles(SyncRoleRequest $request, User $user)
    {
        try {
            $data = $request->validated();
            $user->syncRoles($data['roles']);
            return response(['message' => 'Roles del usuario sincronizados exitosamente'], 200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al sincronizar los roles del usuario',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
