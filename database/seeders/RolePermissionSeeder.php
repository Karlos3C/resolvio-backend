<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar tablas de roles y permisos
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Definir roles y sus permisos según áreas de trabajo y funcionalidades
        $roles = [
            // Administración total del sistema
            'SuperAdmin' => [
                'view users',
                'create users',
                'edit users',
                'update user status',
                'delete users',
                'view roles',
                'create roles',
                'edit roles',
                'delete roles',
                'view permissions',
                'view areas',
                'create areas',
                'edit areas',
                'delete areas',
                'view user status',
                'view issues',
                'create issues',
                'edit issues',
                'delete issues',
                'view priorities',
                'view ticket status',
                'view tickets',
                'create tickets',
                'edit tickets',
                'delete tickets',
                'view attachments',
                'create attachments',
                'delete attachments',
                'view comments',
                'create comments',
                'delete comments',
                'view replies',
                'create replies',
                'delete replies',
            ],

            // Administrador general (sin permisos críticos de sistema)
            'Admin' => [
                'view users',
                'create users',
                'edit users',
                'update user status',
                'view roles',
                'view permissions',
                'view areas',
                'view user status',
                'view issues',
                'create issues',
                'edit issues',
                'view priorities',
                'view ticket status',
                'view tickets',
                'create tickets',
                'edit tickets',
                'delete tickets',
                'view attachments',
                'create attachments',
                'delete attachments',
                'view comments',
                'create comments',
                'delete comments',
                'view replies',
                'create replies',
                'delete replies',
            ],

            // Recursos Humanos (puede gestionar estados: Activo, Inactivo, Suspendido, Bloqueado)
            'HR Manager' => [
                'view users',
                'create users',
                'edit users',
                'update user status',
                'view roles',
                'view areas',
                'view user status',
                'view tickets',
                'create tickets',
                'view comments',
                'create comments',
            ],

            // Soporte Técnico / IT (puede ayudar con usuarios Activo, Pendiente, Invitado)
            'Support Agent' => [
                'view users',
                'view areas',
                'view user status',
                'view issues',
                'create issues',
                'edit issues',
                'view priorities',
                'view ticket status',
                'view tickets',
                'create tickets',
                'edit tickets',
                'view attachments',
                'create attachments',
                'view comments',
                'create comments',
                'view replies',
                'create replies',
            ],

            // Técnico especializado (usuarios Activo solamente)
            'Technician' => [
                'view tickets',
                'edit tickets',
                'view attachments',
                'create attachments',
                'view comments',
                'create comments',
                'view replies',
                'create replies',
            ],

            // Jefe de área (puede ver usuarios Activo, Inactivo de su área)
            'Area Manager' => [
                'view users',
                'view areas',
                'view user status',
                'view issues',
                'create issues',
                'view priorities',
                'view ticket status',
                'view tickets',
                'create tickets',
                'edit tickets',
                'view attachments',
                'create attachments',
                'view comments',
                'create comments',
                'delete comments',
                'view replies',
                'create replies',
                'delete replies',
            ],

            // Empleado de área (usuario Activo solamente)
            'Department Employee' => [
                'view tickets',
                'create tickets',
                'view attachments',
                'create attachments',
                'view comments',
                'create comments',
                'view replies',
                'create replies',
            ],

            // Usuario básico (Activo - acceso básico)
            'Basic User' => [
                'view tickets',
                'create tickets',
                'view comments',
                'create comments',
            ],

            // Usuario invitado (estado Invitado - acceso muy limitado)
            'Guest User' => [
                'view tickets',
            ],

            // Auditor / Solo lectura (puede ver usuarios Activo, Archivado)
            'Viewer' => [
                'view users',
                'view roles',
                'view permissions',
                'view areas',
                'view user status',
                'view issues',
                'view priorities',
                'view ticket status',
                'view tickets',
                'view attachments',
                'view comments',
                'view replies',
            ],

            // Archivista (puede acceder a usuarios Archivado y Eliminado)
            'Archivist' => [
                'view users',
                'view user status',
                'view tickets',
                'view attachments',
                'view comments',
                'view replies',
            ],
        ];

        // Crear roles y asignar permisos
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'sanctum'
            ]);

            $role->syncPermissions($rolePermissions);
        }

        $this->command->info('Roles y permisos creados exitosamente');
        $this->command->info('Total de roles creados: ' . count($roles));
    }
}
