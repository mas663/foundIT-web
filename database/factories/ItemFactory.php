<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? 1,
            'name' => $this->faker->words(2, true),
            'status' => $this->faker->randomElement(['lost', 'found']),
            'category' => $this->faker->randomElement(['Aksesoris', 'Elektronik', 'Kunci', 'Dokumen']),
            'date' => now()->toDateString(),
            'location' => $this->faker->city(),
            'description' => $this->faker->sentence(),
            'kontak' => 'https://wa.me/628' . $this->faker->numerify('8##########'),
            'details' => $this->faker->sentence(),
            'image' => 'https://via.placeholder.com/400x300.png?text=Barang',
            'is_featured' => false,
        ];
    }
}
