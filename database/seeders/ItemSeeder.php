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

        // Data contoh untuk items
        $itemsData = [
            [
                'name' => 'Motor Vario 125',
                'status' => 'lost',
                'category' => 'Kendaraan',
                'location' => 'Surabaya',
                'description' => 'Dicari motor vario 125 warna biru dongker, hilang di area parkir mall.',
                'image' => 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?q=80&w=2070&auto=format&fit=crop',
                'details' => json_encode(['plat_nomor' => 'L 1234 ABC']),
                'is_featured' => true, // Item ini akan jadi pengumuman
            ],
            [
                'name' => 'TWS merk QCY',
                'status' => 'found',
                'category' => 'Elektronik',
                'location' => 'Perpustakaan Kampus',
                'description' => 'Ditemukan TWS merk QCY warna putih di meja baca.',
                'image' => 'https://images.unsplash.com/photo-1610438235354-a6ae5528385c?q=80&w=1935&auto=format&fit=crop',
                'details' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Dompet atas nama Amir',
                'status' => 'found',
                'category' => 'Dompet',
                'location' => 'Kantin',
                'description' => 'Ditemukan dompet kulit warna coklat beserta KTP atas nama Amir.',
                'image' => 'https://images.unsplash.com/photo-1543360223-545239743c7b?q=80&w=2070&auto=format&fit=crop',
                'details' => json_encode(['nama_pemilik' => 'Amir']),
                'is_featured' => false,
            ],
            [
                'name' => 'Kunci motor honda',
                'status' => 'found',
                'category' => 'Kunci',
                'location' => 'Halte Bus',
                'description' => 'Kunci motor dengan gantungan karakter.',
                'image' => 'https://images.unsplash.com/photo-1583204979318-24be2f623c21?q=80&w=2070&auto=format&fit=crop',
                'details' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'HP POCO M3 Pro',
                'status' => 'found',
                'category' => 'Elektronik',
                'location' => 'Kelas 304',
                'description' => 'Ditemukan HP POCO M3 Pro warna biru.',
                'image' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?q=80&w=2068&auto=format&fit=crop',
                'details' => null,
                'is_featured' => false,
            ],
             [
                'name' => 'Iphone 11 warna ungu',
                'status' => 'lost',
                'category' => 'Elektronik',
                'location' => 'Taman Kota',
                'description' => 'Hilang Iphone 11 warna ungu, terakhir digunakan di sekitar bangku taman.',
                'image' => 'https://images.unsplash.com/photo-1606787366850-de6330128214?q=80&w=2070&auto=format&fit=crop',
                'details' => null,
                'is_featured' => false,
            ]
        ];

        foreach ($itemsData as $item) {
            Item::create(array_merge($item, ['user_id' => $user->id, 'date' => now()]));
        }
    }
}
