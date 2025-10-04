<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInRequest;
use App\Http\Requests\Auth\SignUpRequest;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Requests\Auth\ValidateUserRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;

class AuthController extends Controller
{
    public function __construct(protected AuthService $auth_service) {}

    public function signUp(SignUpRequest $request)
    {
        try {
            $this->auth_service->signUpUser($request->validated());
            return response([
                'message' => 'Cuenta creada exitosamente. Por favor, verifica tu correo electrónico para validar la cuenta.',
            ], 201);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al crear la cuenta',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function signIn(SignInRequest $request)
    {
        try {
            $data = $this->auth_service->signInUser($request->validated());
            return response([
                'message' => 'Sesión iniciada con exito',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al iniciar sesión',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        try {
            $this->auth_service->forgotPassword($request->validated());
            return response([
                'message' => 'Revise su email, le hemos enviado un correo con instrucciones',
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al iniciar sesión',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            $this->auth_service->resetPassword($request->validated());
            return response([
                'message' => 'Contraseña actualizada correctamente. Por favor inicie sesión con sus nuevas credenciales',
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al iniciar sesión',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function verifyEmail(VerifyEmailRequest $request)
    {
        try {
            $this->auth_service->verifyEmail($request->validated());
            return response([
                'message' => 'Correo electrónico verificado exitosamente.',
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al verificar el correo electrónico',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function me(ValidateUserRequest $request)
    {
        try {
            $user = $this->auth_service->getAuthenticatedUser($request->validated());
            return response($user);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al obtener el usuario autenticado',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->auth_service->logoutUser($request->user());
            return response([
                'message' => 'Sesión cerrada exitosamente.',
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al cerrar sesión',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
