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
            $user = User::create([
                'name' => 'Dummy User',
                'email' => 'dummy@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Item::create([
                'user_id'    => $user->id,
                'name'       => "Item Contoh ke-$i",
                'status'     => $i % 2 == 0 ? 'lost' : 'found',
                'category'   => 'Elektronik',
                'date'       => now()->subDays($i),
                'location'   => "Lokasi $i",
                'description'=> "Deskripsi item ke-$i yang hilang/ditemukan.",
            ]);
        }
    }
}
