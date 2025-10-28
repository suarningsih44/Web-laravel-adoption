<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Kucing', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Anjing', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Kelinci', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Hamster', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Burung', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}