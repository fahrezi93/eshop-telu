<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 15 Pro Max',
                'slug' => 'iphone-15-pro-max',
                'category' => 'HP',
                'price' => 22999000,
                'description' => 'Smartphone flagship Apple dengan chip A17 Pro, kamera 48MP, dan layar Super Retina XDR 6.7 inch.',
                'image' => '',
                'stock' => 10,
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'slug' => 'samsung-galaxy-s24-ultra',
                'category' => 'HP',
                'price' => 19999000,
                'description' => 'Smartphone premium Samsung dengan S Pen, kamera 200MP, dan AI generatif bawaan.',
                'image' => '',
                'stock' => 15,
            ],
            [
                'name' => 'Xiaomi 14 Ultra',
                'slug' => 'xiaomi-14-ultra',
                'category' => 'HP',
                'price' => 14999000,
                'description' => 'Smartphone flagship killer dengan Leica optics, Snapdragon 8 Gen 3, dan fast charging 90W.',
                'image' => '',
                'stock' => 20,
            ],
            [
                'name' => 'OPPO Find X7 Ultra',
                'slug' => 'oppo-find-x7-ultra',
                'category' => 'HP',
                'price' => 16999000,
                'description' => 'Smartphone flagship dengan dual periskop kamera Hasselblad dan pengisian cepat 100W.',
                'image' => '',
                'stock' => 12,
            ],
            [
                'name' => 'MacBook Pro 14 M3 Pro',
                'slug' => 'macbook-pro-14-m3-pro',
                'category' => 'Laptop',
                'price' => 32999000,
                'description' => 'Laptop profesional Apple dengan chip M3 Pro, RAM 18GB, SSD 512GB, dan layar Liquid Retina XDR.',
                'image' => '',
                'stock' => 5,
            ],
            [
                'name' => 'ASUS ROG Strix G16',
                'slug' => 'asus-rog-strix-g16',
                'category' => 'Laptop',
                'price' => 24999000,
                'description' => 'Laptop gaming dengan Intel Core i9, RTX 4070, RAM 16GB, dan refresh rate 240Hz.',
                'image' => '',
                'stock' => 8,
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon',
                'slug' => 'lenovo-thinkpad-x1-carbon',
                'category' => 'Laptop',
                'price' => 28999000,
                'description' => 'Laptop bisnis premium dengan Intel Core Ultra, layar OLED, dan bodi karbon ringan.',
                'image' => '',
                'stock' => 7,
            ],
            [
                'name' => 'HP Spectre x360 16',
                'slug' => 'hp-spectre-x360-16',
                'category' => 'Laptop',
                'price' => 26999000,
                'description' => 'Laptop convertible premium dengan layar OLED 3K, Intel Core Ultra 7, dan desain elegan.',
                'image' => '',
                'stock' => 6,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
