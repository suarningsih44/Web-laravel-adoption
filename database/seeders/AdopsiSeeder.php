<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdopsiSeeder extends Seeder
{
    public function run(): void
    {
        $adopsi = [
            [
                'id_hewan' => 3, // Milo
                'nama_adopter' => 'Budi Santoso',
                'tanggal_adopsi' => '2024-10-15',
                'status' => 'Selesai'
            ],
            [
                'id_hewan' => 6, // Nala
                'nama_adopter' => 'Siti Nurhaliza',
                'tanggal_adopsi' => '2024-10-20',
                'status' => 'Selesai'
            ],
            [
                'id_hewan' => 9, // Charlie
                'nama_adopter' => 'Ahmad Hidayat',
                'tanggal_adopsi' => '2024-10-22',
                'status' => 'Selesai'
            ],
            [
                'id_hewan' => 12, // Lucy
                'nama_adopter' => 'Dewi Lestari',
                'tanggal_adopsi' => '2024-10-25',
                'status' => 'Selesai'
            ],
            [
                'id_hewan' => 16, // Cotton
                'nama_adopter' => 'Rina Wijaya',
                'tanggal_adopsi' => '2024-10-18',
                'status' => 'Selesai'
            ],
            [
                'id_hewan' => 20, // Oreo
                'nama_adopter' => 'Andi Prasetyo',
                'tanggal_adopsi' => '2024-10-21',
                'status' => 'Selesai'
            ],
            [
                'id_hewan' => 23, // Cookie
                'nama_adopter' => 'Lina Marlina',
                'tanggal_adopsi' => '2024-10-24',
                'status' => 'Selesai'
            ],
            [
                'id_hewan' => 27, // Kiwi
                'nama_adopter' => 'Dika Ramadhan',
                'tanggal_adopsi' => '2024-10-26',
                'status' => 'Selesai'
            ],
        ];

        foreach ($adopsi as $a) {
            DB::table('adopsi')->insert([
                'id_hewan' => $a['id_hewan'],
                'nama_adopter' => $a['nama_adopter'],
                'tanggal_adopsi' => $a['tanggal_adopsi'],
                'status' => $a['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}