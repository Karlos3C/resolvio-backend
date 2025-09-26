<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Activo',
                'description' => 'Usuario activo y con acceso al sistema',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Inactivo',
                'description' => 'Usuario deshabilitado temporalmente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Pendiente',
                'description' => 'Usuario registrado pero aún no confirmado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Suspendido',
                'description' => 'Usuario bloqueado por violar reglas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Eliminado',
                'description' => 'Usuario eliminado lógicamente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Bloqueado',
                'description' => 'Usuario bloqueado permanentemente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Invitado',
                'description' => 'Usuario invitado, aún no registrado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Archivado',
                'description' => 'Usuario inactivo guardado para historial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('user_status')->insert($data);
    }
}
