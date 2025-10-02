<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AdminUpdateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return new UserCollection($users);
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        try {
            $user->update($request->validated());
            return new UserResource($user);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al actualizar el usuario',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        try {
            $user->delete();
            return response([
                'message' => 'Usuario eliminado correctamente'
            ], 200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al eliminar el usuario',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function updateUserStatus(AdminUpdateUserRequest $request, User $user)
    {
        $this->authorize('updateUserStatus', $user);
        try {
            $user->update($request->validated());
            return new UserResource($user);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al actualizar el área ó estado del usuario',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
