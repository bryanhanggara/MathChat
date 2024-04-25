<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'slug' => 'penjumlahan',
                'name' => 'Penjumlahan',
            ],
            [
                'slug' => 'pengurangan',
                'name' => 'Pengurangan',
            ],
            [
                'slug' => 'perkalian',
                'name' => 'Perkalian',
            ],
            [
                'slug' => 'pembagian',
                'name' => 'Pembagian',
            ],
            [
                'slug' => 'logaritma',
                'name' => 'Logaritma',
            ],
            [
                'slug' => 'umum',
                'name' => 'Umum',
            ],
        ]);
    }
}
