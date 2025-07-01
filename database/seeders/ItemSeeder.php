<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Honda Vario Biru',
                'status' => 'lost',
                'category' => 'Kendaraan',
                'date' => '2025-06-25',
                'location' => 'ITS Sukolilo',
                'description' => 'Motor hilang saat diparkir di depan gedung B.',
                'image' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/article/meta/1-ahm-advance-matte-blue-01-2-17102021-115042.jpg',
                'details' => json_encode(['plat_nomor' => 'L 1234 ABC']),
                'is_featured' => true,
                'kontak' => 'https://wa.me/6281359449097',
            ],
            [
                'name' => 'iPhone 11 Ungu',
                'status' => 'lost',
                'category' => 'Elektronik',
                'date' => '2025-06-25',
                'location' => 'Pakuwon Mall',
                'description' => 'Handphone hilang di foodcourt lantai 3.',
                'image' => 'https://cdn.jagofon.com/product/5vDJfyUj4Em0Vmq6LQLmwlMakEjMKJrvKVZgNNhQ.jpeg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6282331346101',
            ],
            [
                'name' => 'Kacamata Minus Bingkai Hitam',
                'status' => 'lost',
                'category' => 'Aksesoris',
                'date' => '2025-06-25',
                'location' => 'Perpustakaan ITS',
                'description' => 'Kacamata tertinggal di ruang baca lantai 2.',
                'image' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//113/MTA-54836897/no_brand_kacamata_minus__warna_hitam_-0-50_sampai_-4-00_rabun_jauh_frame_besi_kotak_kecil_full01_oenr2iwa.jpg',
                'details' => json_encode(['merek' => 'Oakley']),
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281217212964',
            ],
            [
                'name' => 'Flashdisk Sandisk 64GB',
                'status' => 'lost',
                'category' => 'Elektronik',
                'date' => '2025-06-25',
                'location' => 'Lab Komputer',
                'description' => 'Flashdisk hilang saat praktikum.',
                'image' => 'https://datascripmall.id/media/webp_image/catalog/product/cache/95a5307f46190cd7a50cf0819ebeb220/2/0/20210702_210354.webp',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6285706305105',
            ],
            [
                'name' => 'Tumbler Corkcicle Hitam',
                'status' => 'lost',
                'category' => 'Perlengkapan',
                'date' => '2025-06-25',
                'location' => 'Kantin Teknik',
                'description' => 'Tumbler tertinggal di meja makan.',
                'image' => 'https://down-id.img.susercontent.com/file/id-11134207-7r992-llelvp3rulplaa',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6285695175726',
            ],
            [
                'name' => 'QCY T13 Earbuds',
                'status' => 'found',
                'category' => 'Elektronik',
                'date' => '2025-06-25',
                'location' => 'Halaman Parkir',
                'description' => 'Earbuds ditemukan di samping motor.',
                'image' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//100/MTA-93814534/qcy_true_wireless_earbuds_qcy_t13_full01_f13293ca.jpg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281336464103',
            ],
            [
                'name' => 'Dompet atas nama Amir',
                'status' => 'found',
                'category' => 'Aksesoris',
                'date' => '2025-06-25',
                'location' => 'Lapangan Basket',
                'description' => 'Dompet ditemukan, berisi KTP atas nama Amir.',
                'image' => 'https://down-id.img.susercontent.com/file/id-11134207-7r98s-ltkgerjwrf1y1e',
                'details' => json_encode(['nama_pemilik' => 'Amir']),
                'is_featured' => false,
                'kontak' => 'https://wa.me/6283146186053',
            ],
            [
                'name' => 'Kunci motor Honda',
                'status' => 'found',
                'category' => 'Kunci',
                'date' => '2025-06-25',
                'location' => 'Depan Gedung A',
                'description' => 'Kunci ditemukan tergantung di pagar.',
                'image' => 'https://down-id.img.susercontent.com/file/a44e991b826e567e9bca7aab703308e7',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281373218995',
            ],
            [
                'name' => 'HP POCO M3 Pro',
                'status' => 'found',
                'category' => 'Elektronik',
                'date' => '2025-06-25',
                'location' => 'Foodcourt',
                'description' => 'HP ditemukan di kursi foodcourt.',
                'image' => 'https://i02.appmifile.com/444_comments_in/08/07/2021/4f838b3e6b49e3604f0dadb3d10a256f.jpg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6282132213370',
            ],
            [
                'name' => 'Kartu ATM BRI',
                'status' => 'found',
                'category' => 'Dokumen',
                'date' => '2025-06-25',
                'location' => 'ATM Center',
                'description' => 'ATM BRI ditemukan tertinggal di mesin.',
                'image' => 'https://asset.kompas.com/crops/b_GlS6aCs985jTUUWUO4ynP0oHA=/49x40:656x445/750x500/data/photo/2022/05/13/627e2d26e2139.jpg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281312088430',
            ],
            [
                'name' => 'STNK atas nama Putri',
                'status' => 'found',
                'category' => 'Dokumen',
                'date' => '2025-06-25',
                'location' => 'Parkiran Timur',
                'description' => 'STNK ditemukan di bawah motor.',
                'image' => 'https://www.astra-daihatsu.id/_next/image?url=https%3A%2F%2Fdsoodysseusstprod.blob.core.windows.net%2Fstrapi-media%2Fassets%2Fsys_master_media_h06_h09_8822554820638_Cara_Mengurus_STNK_yang_Hilang_atau_Rusak_Dengan_Mudah_2023_2d9384aedd.jpg&w=3840&q=75',
                'details' => json_encode(['nama_pemilik' => 'Putri']),
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281359449097',
            ],
            [
                'name' => 'Jam tangan Casio',
                'status' => 'found',
                'category' => 'Aksesoris',
                'date' => '2025-06-25',
                'location' => 'Toilet Gedung C',
                'description' => 'Jam tangan ditemukan di wastafel.',
                'image' => 'https://media.dinomarket.com/docs/imgTD/2022-08/_SMine_1659346028122_010822160808_ll.jpg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6282331346101',
            ],
        ];

        foreach ($items as $item) {
            // Cari ID kategori berdasarkan nama kategori
            $category = Category::where('name', $item['category'])->first();

            // Masukkan category_id ke data item, hapus key 'category'
            $item['category_id'] = $category ? $category->id : null;
            unset($item['category']);

            // Jika details berupa array, encode jadi JSON string
            if (isset($item['details']) && is_array($item['details'])) {
                $item['details'] = json_encode($item['details']);
            }

            // Simpan item ke database
            Item::create($item);
        }
    }
}
