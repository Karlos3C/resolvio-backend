<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authorization\DestroyRoleRequest;
use App\Http\Requests\Authorization\StoreRoleRequest;
use App\Http\Requests\Authorization\UpdateRoleRequest;
use App\Http\Resources\Authorization\RoleCollection;
use App\Services\Authorization\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(private RoleService $role_service) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return new RoleCollection($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        try {
            $this->role_service->createRole($request->validated());
            return response(['message' => 'Rol creado exitosamente'], 201);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al crear el rol',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {
            $this->role_service->updateRole($role, $request->validated());
            return response(['message' => 'Rol actualizado exitosamente'], 200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al actualizar el rol',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
