<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cores_cars')->insert([
            ['nome' => 'Vermelho'],
            ['nome' => 'Azul'],
            ['nome' => 'Preto'],
            ['nome' => 'Branco'],
            ['nome' => 'Prata'],
        ]);
    }
}
