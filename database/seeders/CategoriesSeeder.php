<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kendaraan',   'description' => 'Kendaraan dan perlengkapannya seperti motor, STNK, helm, dll.'],
            ['name' => 'Elektronik',  'description' => 'Perangkat elektronik seperti handphone, laptop, earphone, flashdisk, dll.'],
            ['name' => 'Aksesoris',   'description' => 'Barang-barang pelengkap seperti jam tangan, kacamata, gelang, dll.'],
            ['name' => 'Perlengkapan','description' => 'Barang-barang perlengkapan sehari-hari seperti tumbler, tas, dll.'],
            ['name' => 'Kunci',       'description' => 'Kunci rumah, kunci motor, dan sejenisnya.'],
            ['name' => 'Dokumen',     'description' => 'Kartu identitas, ATM, STNK, surat penting, dll.'],
            ['name' => 'Lainnya',     'description' => 'Kategori lain yang tidak termasuk di atas.']
        ];

        DB::table('categories')->insert($categories);
    }
}