<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
        \App\Models\Departemen::create([
            'kode_departemen' => 'DPT001',
            'nama_departemen' => 'Keuangan',
        ]);

        \App\Models\Departemen::create([
            'kode_departemen' => 'DPT002',
            'nama_departemen' => 'Pemasaran',
        ]);

        \App\Models\Departemen::create([
            'kode_departemen' => 'DPT003',
            'nama_departemen' => 'Produksi',
        ]);

        \App\Models\Departemen::create([
            'kode_departemen' => 'DPT004',
            'nama_departemen' => 'Gudang',
        ]);
    }
}
