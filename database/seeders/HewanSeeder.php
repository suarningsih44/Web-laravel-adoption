<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HewanSeeder extends Seeder
{
    public function run(): void
    {
        $hewan = [
            // Kucing (id_kategori: 1)
            ['nama_hewan' => 'Whiskers', 'id_kategori' => 1, 'deskripsi' => 'Kucing persia putih, jinak dan lucu', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Luna', 'id_kategori' => 1, 'deskripsi' => 'Kucing anggora abu-abu, suka bermain', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Milo', 'id_kategori' => 1, 'deskripsi' => 'Kucing kampung orange, ramah dengan anak-anak', 'status' => 'Diadopsi'],
            ['nama_hewan' => 'Bella', 'id_kategori' => 1, 'deskripsi' => 'Kucing persia hitam, mata biru', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Simba', 'id_kategori' => 1, 'deskripsi' => 'Kucing maine coon, besar dan berbulu lebat', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Nala', 'id_kategori' => 1, 'deskripsi' => 'Kucing scottish fold, telinga lipat yang menggemaskan', 'status' => 'Diadopsi'],
            
            // Anjing (id_kategori: 2)
            ['nama_hewan' => 'Buddy', 'id_kategori' => 2, 'deskripsi' => 'Golden retriever, sangat setia dan ramah', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Max', 'id_kategori' => 2, 'deskripsi' => 'Bulldog inggris, pendek dan menggemaskan', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Charlie', 'id_kategori' => 2, 'deskripsi' => 'Beagle, aktif dan suka bermain', 'status' => 'Diadopsi'],
            ['nama_hewan' => 'Daisy', 'id_kategori' => 2, 'deskripsi' => 'Poodle toy, kecil dan cerdas', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Rocky', 'id_kategori' => 2, 'deskripsi' => 'German shepherd, pemberani dan protektif', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Lucy', 'id_kategori' => 2, 'deskripsi' => 'Shih tzu, berbulu panjang dan lembut', 'status' => 'Diadopsi'],
            ['nama_hewan' => 'Duke', 'id_kategori' => 2, 'deskripsi' => 'Husky siberia, mata biru cantik', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Molly', 'id_kategori' => 2, 'deskripsi' => 'Chihuahua, kecil tapi berani', 'status' => 'Tersedia'],
            
            // Kelinci (id_kategori: 3)
            ['nama_hewan' => 'Fluffy', 'id_kategori' => 3, 'deskripsi' => 'Kelinci anggora putih, berbulu halus', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Cotton', 'id_kategori' => 3, 'deskripsi' => 'Kelinci holland lop, telinga jatuh', 'status' => 'Diadopsi'],
            ['nama_hewan' => 'Snowball', 'id_kategori' => 3, 'deskripsi' => 'Kelinci rex, bulu seperti beludru', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Thumper', 'id_kategori' => 3, 'deskripsi' => 'Kelinci flemish giant, ukuran besar', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Clover', 'id_kategori' => 3, 'deskripsi' => 'Kelinci lionhead, kepala berbulu seperti singa', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Oreo', 'id_kategori' => 3, 'deskripsi' => 'Kelinci dutch, hitam putih', 'status' => 'Diadopsi'],
            
            // Hamster (id_kategori: 4)
            ['nama_hewan' => 'Nibbles', 'id_kategori' => 4, 'deskripsi' => 'Hamster syria, emas dan lucu', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Peanut', 'id_kategori' => 4, 'deskripsi' => 'Hamster roborovski, sangat kecil dan cepat', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Cookie', 'id_kategori' => 4, 'deskripsi' => 'Hamster winter white, bulu putih', 'status' => 'Diadopsi'],
            ['nama_hewan' => 'Chip', 'id_kategori' => 4, 'deskripsi' => 'Hamster campbell, cokelat muda', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Marshmallow', 'id_kategori' => 4, 'deskripsi' => 'Hamster chinese, ekor panjang', 'status' => 'Tersedia'],
            
            // Burung (id_kategori: 5)
            ['nama_hewan' => 'Tweety', 'id_kategori' => 5, 'deskripsi' => 'Lovebird kuning, cerewet dan lucu', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Kiwi', 'id_kategori' => 5, 'deskripsi' => 'Parkit hijau, bisa dilatih bicara', 'status' => 'Diadopsi'],
            ['nama_hewan' => 'Rio', 'id_kategori' => 5, 'deskripsi' => 'Macaw biru, besar dan indah', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Sunny', 'id_kategori' => 5, 'deskripsi' => 'Kenari kuning cerah, suara merdu', 'status' => 'Tersedia'],
            ['nama_hewan' => 'Polly', 'id_kategori' => 5, 'deskripsi' => 'Cockatiel abu-abu, jambul oranye', 'status' => 'Tersedia'],
        ];

        foreach ($hewan as $h) {
            DB::table('hewan')->insert([
                'nama_hewan' => $h['nama_hewan'],
                'id_kategori' => $h['id_kategori'],
                'deskripsi' => $h['deskripsi'],
                'status' => $h['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}