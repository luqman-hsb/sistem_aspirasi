<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = [
            ['nis' => 12345, 'kelas' => 'XII IPA 1'],
            ['nis' => 12346, 'kelas' => 'XII IPS 1'],
            ['nis' => 12347, 'kelas' => 'XII IPA 2'],
        ];

        DB::table('siswa')->insert($siswas);
    }
}

