<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Ilmuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
public function run()
{
    DB::table('todos')->insert([
        [
            'task' => 'Belanja bahan makanan',
            'completed' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'task' => 'Beli buah-buahan',
            'completed' => false,
            'created_at' => carbon::now(),
            'updated_at' => carbon::now()
        ],
        [
            'task' => 'Selesaikan Proyek Laravel',
            'completed' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    ]);
}
}