<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CarroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carros')->insert([
            [
                'Marca' => 'Honda',
                'modelo' => 'Civic',
                'ano' => '2018',
                'preço' => 80000.00,
                'cor_id' => 1,
            ],
            [
                'Marca' => 'Honda',
                'modelo' => 'Fit',
                'ano' => '2018',
                'preço' => 65000.00,
                'cor_id' => 2,
            ],
            [
                'Marca' => 'Toyota',
                'modelo' => 'Corolla',
                'ano' => '2015',
                'preço' => 70000.00,
                'cor_id' => 3,
            ],
            [
                'Marca' => 'Fiat',
                'modelo' => 'Uno',
                'ano' => '1997',
                'preço' => 8000.00,
                'cor_id' => 4,
            ],
            [
                'Marca' => 'Fiat',
                'modelo' => 'Punto',
                'ano' => '2010',
                'preço' => 25000.00,
                'cor_id' => 5,
            ],
        ]);
    }
}
