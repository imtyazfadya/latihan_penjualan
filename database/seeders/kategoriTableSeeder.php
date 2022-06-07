<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kategori;

class kategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategori::create(['nama'=>'Makanan']);
        kategori::create(['nama'=>'Perlengkapan Ruman Tangga']);
        kategori::create(['nama'=>'Alat Belajar']);
        //
    }
}
