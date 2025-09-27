<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            //users
            'view users',
            'create users',
            'edit users',
            'update user status',
            'delete users',

            //roles
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',

            //permissions
            'view permissions',

            //areas
            'view areas',
            'create areas',
            'edit areas',
            'delete areas',

            //user status
            'view user status',

            //issues
            'view issues',
            'create issues',
            'edit issues',
            'delete issues',

            //priorities
            'view priorities',

            //ticket status
            'view ticket status',

            //tickets
            'view tickets',
            'create tickets',
            'edit tickets',
            'delete tickets',

            //attachments
            'view attachments',
            'create attachments',
            'delete attachments',

            //comments
            'view comments',
            'create comments',
            'delete comments',

            //reply comments
            'view replies',
            'create replies',
            'delete replies',
        ];

        DB::table('permissions')->insert(
            collect($data)->map(fn($permission) => [
                'name' => $permission,
                'guard_name' => 'sanctum',
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray()
        );
    }
}
