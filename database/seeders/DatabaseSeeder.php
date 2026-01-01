<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user with complete profile
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'address' => 'Jl. Sudirman No. 123, Jakarta Pusat, DKI Jakarta 10220',
            'phone' => '081234567890',
        ]);

        // Seed products
        $this->call([
            ProductSeeder::class,
        ]);
    }
}

