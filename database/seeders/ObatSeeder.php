<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Obat;
class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obat::insert([
            ['nama' => 'Paracetamol', 'jenis' => 'Tablet', 'stok' => 100, 'harga' => 2000],
            ['nama' => 'Amoxicillin', 'jenis' => 'Kapsul', 'stok' => 75, 'harga' => 5000],
            ['nama' => 'OBH Combi', 'jenis' => 'Sirup', 'stok' => 50, 'harga' => 10000],
            ['nama' => 'Vitamin C', 'jenis' => 'Tablet', 'stok' => 120, 'harga' => 1500],
            ['nama' => 'Salep Kulit', 'jenis' => 'Salep', 'stok' => 60, 'harga' => 7000],
        ]);
    }
}
