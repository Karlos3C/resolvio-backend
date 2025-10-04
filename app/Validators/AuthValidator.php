<?php

namespace App\Validators;

use App\Models\Catalog\UserStatus;
use App\Models\User;

class AuthValidator {
    public function UserStatus(User $user) {
        $status = UserStatus::findOrFail($user->user_status_id);
        $status_name = $status->name;
        if($status_name !== "Activo" && $status_name !== "Invitado") 
            throw new \Exception("Acceso no autorizado");
    }
}
