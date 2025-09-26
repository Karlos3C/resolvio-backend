<?php

namespace App\Services\Auth;

use App\Http\Resources\UserResource;
use App\Mail\ConfirmationEmail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthService
{

    public function signUpUser(array $data): void
    {
        DB::transaction(function () use ($data) {
            $token = rand(100000, 999999);
            $data['token'] = $token;
            $data['user_status_id'] = 3;
            Mail::to($data['email'])->send(new ConfirmationEmail($token));
            User::create($data);
        });
    }

    public function verifyEmail(array $data): void
    {
        $user = User::where('email', $data['email'])->first();
        if (!$user) throw new \Exception('Usuario no encontrado');
        if ($user->email_verified_at) throw new \Exception('El correo ya ha sido verificado');
        if ($user->token !== $data['token']) throw new \Exception('El token no es válido');
        $user->email_verified_at = now();
        $user->token = null;
        $user->save();
    }

    public function signInUser(array $credentials): array
    {
        if (!auth()->attempt($credentials)) throw new \Exception('Credenciales inválidas');
        $user = auth()->user();
        if (!$user->email_verified_at) throw new \Exception('El correo electrónico no ha sido verificado');
        $token = $user->createToken('auth_token')->plainTextToken;
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => new UserResource($user),
        ];
    }

    public function getAuthenticatedUser(array $data): UserResource
    {
        $user = User::find($data['id']);
        if (!$user) throw new \Exception('Usuario no autenticado');
        return new UserResource($user);
    }

    public function logoutUser($user)
    {
        $user->tokens()->delete();
    }
}
