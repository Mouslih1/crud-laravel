<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class classestableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->insert([
            ['libelle' => '6 éme'],
            ['libelle' => '5 éme'],
            ['libelle' => '4 éme'],
            ['libelle' => '3 éme'],
            ['libelle' => 'secondaire'],
            ['libelle' => 'primaire'],
        ]);
    }
}
