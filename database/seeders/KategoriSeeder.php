<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['id_kategori' => 1, 'ket_kategori' => 'Ruang Kelas'],
            ['id_kategori' => 2, 'ket_kategori' => 'Toilet'],
            ['id_kategori' => 3, 'ket_kategori' => 'Laboratorium'],
            ['id_kategori' => 4, 'ket_kategori' => 'Perpustakaan'],
            ['id_kategori' => 5, 'ket_kategori' => 'Lapangan'],
        ];

        DB::table('kategori')->insert($kategoris);
    }
}

