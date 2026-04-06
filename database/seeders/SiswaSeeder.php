<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = [
            ['nis' => 12345, 'kelas' => 'XII IPA 1', 'password' => Hash::make('password')],
            ['nis' => 12346, 'kelas' => 'XII IPS 1', 'password' => Hash::make('password')],
            ['nis' => 12347, 'kelas' => 'XII IPA 2', 'password' => Hash::make('password')],
        ];

        DB::table('siswa')->insert($siswas);
    }
}

