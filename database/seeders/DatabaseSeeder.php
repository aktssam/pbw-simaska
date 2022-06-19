<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
            // 'password' => bcrypt('admin'),
        ]);

        /* ===== Seeder Kategori ===== */
        \App\Models\Kategori::create([
            'kode_kategori' => 'KR02',
            'nama_kategori' => 'Sepeda Motor',
        ]);

        \App\Models\Kategori::create([
            'kode_kategori' => 'KR03',
            'nama_kategori' => 'Motor Tossa',
        ]);

        \App\Models\Kategori::create([
            'kode_kategori' => 'KR04',
            'nama_kategori' => 'Mobil',
        ]);


        /* ===== Seeder Departemen ===== */
        \App\Models\Department::create([
            'kode_department' => 'DPT001',
            'nama_department' => 'Keuangan',
        ]);

        \App\Models\Department::create([
            'kode_department' => 'DPT002',
            'nama_department' => 'Pemasaran',
        ]);

        \App\Models\Department::create([
            'kode_department' => 'DPT003',
            'nama_department' => 'Produksi',
        ]);

        \App\Models\Department::create([
            'kode_department' => 'DPT004',
            'nama_department' => 'Gudang',
        ]);


        /* ===== Seeder Kendaraan ===== */
        \App\Models\Kendaraan::create([
            'nopol' => 'W 10 S',
            'merk' => 'Toyota',
            'tipe' => 'Avanza',
            'kategori_id' => 3,
            'department_id' => 3,
        ]);

        \App\Models\Kendaraan::create([
            'nopol' => 'L 10 S',
            'merk' => 'Honda',
            'tipe' => 'Beat',
            'kategori_id' => 1,
            'department_id' => 2,
        ]);
    }
}
