<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('ticket_status')->insert([
            [
                'name' => 'Abierto',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'En Progreso',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Resuelto',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Cerrado',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Reabierto',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
