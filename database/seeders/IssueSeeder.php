<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('issues')->insert([
            // Técnicos
            ['id' => 1, 'name' => 'Bug', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'name' => 'Nueva Funcionalidad', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'name' => 'Mejora', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'name' => 'Optimización', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'name' => 'Tarea', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6, 'name' => 'Investigación', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7, 'name' => 'Documentación', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8, 'name' => 'Soporte', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9, 'name' => 'Mantenimiento', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'name' => 'Refactorización', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 11, 'name' => 'Corrección Urgente', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'name' => 'Seguridad', 'created_at' => $now, 'updated_at' => $now],

            // Administración / Finanzas
            ['id' => 13, 'name' => 'Solicitud de Aprobación', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 14, 'name' => 'Problema de Facturación', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 15, 'name' => 'Error de Pago', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 16, 'name' => 'Ajuste Presupuestal', 'created_at' => $now, 'updated_at' => $now],

            // Recursos Humanos
            ['id' => 17, 'name' => 'Solicitud de Ingreso de Personal', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 18, 'name' => 'Problema de Nómina', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 19, 'name' => 'Solicitud de Vacaciones', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 20, 'name' => 'Solicitud de Capacitación', 'created_at' => $now, 'updated_at' => $now],

            // Ventas / Marketing
            ['id' => 21, 'name' => 'Asignación de Prospecto', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 22, 'name' => 'Solicitud de Campaña', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 23, 'name' => 'Actualización de Precios', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 24, 'name' => 'Queja de Cliente', 'created_at' => $now, 'updated_at' => $now],

            // Logística / Operaciones
            ['id' => 25, 'name' => 'Retraso en Envío', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 26, 'name' => 'Problema de Inventario', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 27, 'name' => 'Cumplimiento de Pedido', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 28, 'name' => 'Problema con Proveedor', 'created_at' => $now, 'updated_at' => $now],

            // Soporte General
            ['id' => 29, 'name' => 'Solicitud de Acceso', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 30, 'name' => 'Restablecimiento de Contraseña', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 31, 'name' => 'Caída del Sistema', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 32, 'name' => 'Problema de Rendimiento', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
