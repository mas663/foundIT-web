<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Dummy User',
                'email' => 'dummy@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        Item::query()->delete();

        $itemsData = [
            // BARANG HILANG (LOST)
            [
                'name' => 'Motor Vario 125 Biru',
                'status' => 'lost',
                'category' => 'Kendaraan',
                'location' => 'Pusat Perbelanjaan Surabaya',
                'description' => 'Telah hilang sebuah motor Honda Vario 125 berwarna biru dongker metalik di area parkir sebuah pusat perbelanjaan, ciri khusus ada stiker kecil di spakbor depan.',
                'image' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/article/meta/1-ahm-advance-matte-blue-01-2-17102021-115042.jpg',
                'details' => json_encode(['plat_nomor' => 'L 1234 ABC']),
                'is_featured' => true,
                'kontak' => 'https://wa.me/6281359449097',
            ],
            [
                'name' => 'iPhone 11 Ungu',
                'status' => 'lost',
                'category' => 'Elektronik',
                'location' => 'Taman Bungkul',
                'description' => 'Kehilangan sebuah iPhone 11 dengan case transparan yang sedikit menguning, terakhir kali terlihat di bangku taman dekat air mancur saat sore hari.',
                'image' => 'https://cdn.jagofon.com/product/5vDJfyUj4Em0Vmq6LQLmwlMakEjMKJrvKVZgNNhQ.jpeg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6282331346101',
            ],
            [
                'name' => 'Kacamata Minus Bingkai Hitam',
                'status' => 'lost',
                'category' => 'Aksesoris',
                'location' => 'Bioskop Tunjungan Plaza',
                'description' => 'Sebuah kacamata minus dengan bingkai plastik tebal berwarna hitam telah hilang, kemungkinan terjatuh di dalam bioskop saat menonton film malam.',
                'image' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//113/MTA-54836897/no_brand_kacamata_minus__warna_hitam_-0-50_sampai_-4-00_rabun_jauh_frame_besi_kotak_kecil_full01_oenr2iwa.jpg',
                'details' => json_encode(['merek' => 'Oakley']),
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281217212964',
            ],
             [
                'name' => 'Flashdisk Sandisk 64GB',
                'status' => 'lost',
                'category' => 'Elektronik',
                'location' => 'Perpustakaan ITS',
                'description' => 'Kehilangan flashdisk merk Sandisk berwarna hitam-merah berisi file-file tugas akhir yang sangat penting, kemungkinan tertinggal di komputer perpustakaan.',
                'image' => 'https://datascripmall.id/media/webp_image/catalog/product/cache/95a5307f46190cd7a50cf0819ebeb220/2/0/20210702_210354.webp',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6285706305105',
            ],
            [
                'name' => 'Tumbler Corkcicle Hitam',
                'status' => 'lost',
                'category' => 'Lainnya',
                'location' => 'Lapangan Basket Unair',
                'description' => 'Telah kehilangan sebuah botol minum atau tumbler merk Corkcicle berwarna hitam doff, terakhir diletakkan di meja dekat lapangan basket.',
                'image' => 'https://down-id.img.susercontent.com/file/id-11134207-7r992-llelvp3rulplaa',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6285695175726',
            ],

            // BARANG DITEMUKAN (FOUND)
            [
                'name' => 'TWS merk QCY',
                'status' => 'found',
                'category' => 'Elektronik',
                'location' => 'Perpustakaan Kampus ITS',
                'description' => 'Telah ditemukan sebuah case TWS nirkabel berwarna putih dari merk QCY di salah satu meja baca area perpustakaan kampus.',
                'image' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//100/MTA-93814534/qcy_true_wireless_earbuds_qcy_t13_full01_f13293ca.jpg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281336464103',
            ],
            [
                'name' => 'Dompet atas nama Amir',
                'status' => 'found',
                'category' => 'Dompet',
                'location' => 'Kantin Pusat ITS',
                'description' => 'Ditemukan sebuah dompet kulit berwarna coklat yang sudah sedikit usang, di dalamnya terdapat KTP dan SIM C atas nama Amir.',
                'image' => 'https://down-id.img.susercontent.com/file/id-11134207-7r98s-ltkgerjwrf1y1e',
                'details' => json_encode(['nama_pemilik' => 'Amir']),
                'is_featured' => false,
                'kontak' => 'https://wa.me/6283146186053',
            ],
            [
                'name' => 'Kunci motor Honda',
                'status' => 'found',
                'category' => 'Kunci',
                'location' => 'Halte Bus Bundaran ITS',
                'description' => 'Sebuah kunci motor Honda dengan gantungan kunci karakter Spongebob ditemukan tergeletak di lantai dekat halte bus.',
                'image' => 'https://down-id.img.susercontent.com/file/a44e991b826e567e9bca7aab703308e7',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281373218995',
            ],
            [
                'name' => 'HP POCO M3 Pro',
                'status' => 'found',
                'category' => 'Elektronik',
                'location' => 'Ruang Kelas 304 Departemen Sistem Informasi',
                'description' => 'Telah ditemukan sebuah ponsel POCO M3 Pro berwarna biru dalam kondisi menyala namun terkunci, tertinggal di ruang kelas 304.',
                'image' => 'https://i02.appmifile.com/444_comments_in/08/07/2021/4f838b3e6b49e3604f0dadb3d10a256f.jpg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6282132213370',
            ],
            [
                'name' => 'Kartu ATM BRI',
                'status' => 'found',
                'category' => 'Dokumen',
                'location' => 'Mesin ATM dekat Gerbang Utama',
                'description' => 'Ditemukan sebuah kartu debit atau ATM Bank BRI yang sepertinya baru saja keluar dari mesin ATM dan tidak diambil oleh pemiliknya.',
                'image' => 'https://asset.kompas.com/crops/b_GlS6aCs985jTUUWUO4ynP0oHA=/49x40:656x445/750x500/data/photo/2022/05/13/627e2d26e2139.jpg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281312088430',
            ],
            [
                'name' => 'STNK atas nama Putri',
                'status' => 'found',
                'category' => 'Dokumen',
                'location' => 'Area Parkir Departemen Teknik Informatika',
                'description' => 'Telah ditemukan sebuah STNK untuk kendaraan sepeda motor yang tergeletak di area parkir, STNK tersebut atas nama Putri.',
                'image' => 'https://www.astra-daihatsu.id/_next/image?url=https%3A%2F%2Fdsoodysseusstprod.blob.core.windows.net%2Fstrapi-media%2Fassets%2Fsys_master_media_h06_h09_8822554820638_Cara_Mengurus_STNK_yang_Hilang_atau_Rusak_Dengan_Mudah_2023_2d9384aedd.jpg&w=3840&q=75',
                'details' => json_encode(['nama_pemilik' => 'Putri']),
                'is_featured' => false,
                'kontak' => 'https://wa.me/6281359449097',
            ],
             [
                'name' => 'Jam tangan Casio',
                'status' => 'found',
                'category' => 'Aksesoris',
                'location' => 'Pinggir Lapangan Futsal',
                'description' => 'Ditemukan sebuah jam tangan digital merk Casio berwarna hitam, tergeletak di pinggir lapangan futsal saat sore hari.',
                'image' => 'https://media.dinomarket.com/docs/imgTD/2022-08/_SMine_1659346028122_010822160808_ll.jpg',
                'details' => null,
                'is_featured' => false,
                'kontak' => 'https://wa.me/6282331346101',
            ]
        ];

        foreach ($itemsData as $item) {
            Item::create(array_merge($item, [
                'user_id' => $user->id,
                'date' => now()->subDays(rand(1,30)),
                'created_at' => now(),
                'updated_at' => now()
            ]));
        }
    }
}
