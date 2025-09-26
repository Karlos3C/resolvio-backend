<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('priorities')->insert([
            [
                'name' => 'Muy Bajo',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Bajo',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Medio',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Alto',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Crítico',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
