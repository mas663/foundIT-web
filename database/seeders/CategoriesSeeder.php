<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Aksesoris',   'description' => 'Barang-barang pelengkap seperti jam tangan, gelang, dll.'],
            ['name' => 'Dokumen',     'description' => 'Kartu identitas, ijazah, surat penting, dll.'],
            ['name' => 'Dompet',      'description' => 'Dompet berisi uang, kartu, dan dokumen pribadi.'],
            ['name' => 'Elektronik',  'description' => 'Perangkat elektronik seperti handphone, laptop, dll.'],
            ['name' => 'Kendaraan',   'description' => 'Sepeda, motor, STNK, kunci kendaraan, dll.'],
            ['name' => 'Kunci',       'description' => 'Kunci rumah, kunci motor, dan sejenisnya.'],
            ['name' => 'Lainnya',     'description' => 'Kategori lain yang tidak termasuk di atas.'],
        ];

        DB::table('categories')->insert($categories);
    }
}
