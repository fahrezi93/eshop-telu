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
                'image' => '/images/products/iphone-15-pro-max.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'slug' => 'samsung-galaxy-s24-ultra',
                'category' => 'HP',
                'price' => 19999000,
                'description' => 'Smartphone premium Samsung dengan S Pen, kamera 200MP, dan AI generatif bawaan.',
                'image' => '/images/products/samsung-galaxy-s24-ultra.jpg',
                'stock' => 15,
            ],
            [
                'name' => 'Xiaomi 14 Ultra',
                'slug' => 'xiaomi-14-ultra',
                'category' => 'HP',
                'price' => 14999000,
                'description' => 'Smartphone flagship killer dengan Leica optics, Snapdragon 8 Gen 3, dan fast charging 90W.',
                'image' => '/images/products/xiaomi-14-ultra.jpg',
                'stock' => 20,
            ],
            [
                'name' => 'OPPO Find X7 Ultra',
                'slug' => 'oppo-find-x7-ultra',
                'category' => 'HP',
                'price' => 16999000,
                'description' => 'Smartphone flagship dengan dual periskop kamera Hasselblad dan pengisian cepat 100W.',
                'image' => '/images/products/oppo-find-x7-ultra.jpg',
                'stock' => 12,
            ],
            [
                'name' => 'MacBook Pro 14 M3 Pro',
                'slug' => 'macbook-pro-14-m3-pro',
                'category' => 'Laptop',
                'price' => 32999000,
                'description' => 'Laptop profesional Apple dengan chip M3 Pro, RAM 18GB, SSD 512GB, dan layar Liquid Retina XDR.',
                'image' => '/images/products/macbook-pro-14-m3-pro.jpg',
                'stock' => 5,
            ],
            [
                'name' => 'ASUS ROG Strix G16',
                'slug' => 'asus-rog-strix-g16',
                'category' => 'Laptop',
                'price' => 24999000,
                'description' => 'Laptop gaming dengan Intel Core i9, RTX 4070, RAM 16GB, dan refresh rate 240Hz.',
                'image' => '/images/products/asus-rog-strix-g16.jpg',
                'stock' => 8,
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon',
                'slug' => 'lenovo-thinkpad-x1-carbon',
                'category' => 'Laptop',
                'price' => 28999000,
                'description' => 'Laptop bisnis premium dengan Intel Core Ultra, layar OLED, dan bodi karbon ringan.',
                'image' => '/images/products/lenovo-thinkpad-x1-carbon.jpg',
                'stock' => 7,
            ],
            [
                'name' => 'HP Spectre x360 16',
                'slug' => 'hp-spectre-x360-16',
                'category' => 'Laptop',
                'price' => 26999000,
                'description' => 'Laptop convertible premium dengan layar OLED 3K, Intel Core Ultra 7, dan desain elegan.',
                'image' => '/images/products/hp-spectre-x360-16.jpg',
                'stock' => 6,
            ],
            // New Phones
            [
                'name' => 'Google Pixel 8 Pro',
                'slug' => 'google-pixel-8-pro',
                'category' => 'HP',
                'price' => 17999000,
                'description' => 'Smartphone Google dengan kamera AI terbaik, prosesor Tensor G3, dan update 7 tahun.',
                'image' => '/images/products/google-pixel-8-pro.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Asus Zenfone 10',
                'slug' => 'asus-zenfone-10',
                'category' => 'HP',
                'price' => 11999000,
                'description' => 'Smartphone flagship compact dengan Snapdragon 8 Gen 2 dan stabilizer gimbal hibrida.',
                'image' => '/images/products/asus-zenfone-10.jpg',
                'stock' => 15,
            ],
            [
                'name' => 'Sony Xperia 1 V',
                'slug' => 'sony-xperia-1-v',
                'category' => 'HP',
                'price' => 20999000,
                'description' => 'Smartphone untuk kreator konten dengan sensor kamera Exmor T dan layar 4K OLED 21:9.',
                'image' => '/images/products/sony-xperia-1-v.jpg',
                'stock' => 5,
            ],
            [
                'name' => 'Vivo X100 Pro',
                'slug' => 'vivo-x100-pro',
                'category' => 'HP',
                'price' => 16499000,
                'description' => 'Smartphone fotografi dengan lensa ZEISS APO Floating Telephoto dan Dimensity 9300.',
                'image' => '/images/products/vivo-x100-pro.jpg',
                'stock' => 8,
            ],
            // New Laptops
            [
                'name' => 'Dell XPS 15',
                'slug' => 'dell-xps-15',
                'category' => 'Laptop',
                'price' => 35999000,
                'description' => 'Laptop creator premium dengan layar 3.5K OLED, Intel Core i9, dan grafis RTX 4060.',
                'image' => '/images/products/dell-xps-15.jpg',
                'stock' => 4,
            ],
            [
                'name' => 'Razer Blade 16',
                'slug' => 'razer-blade-16',
                'category' => 'Laptop',
                'price' => 45999000,
                'description' => 'Laptop gaming monster dengan layar Dual Mode (4K/120Hz atau FHD/240Hz) dan RTX 4090.',
                'image' => '/images/products/razer-blade-16.jpg',
                'stock' => 3,
            ],
            [
                'name' => 'Surface Laptop Studio 2',
                'slug' => 'surface-laptop-studio-2',
                'category' => 'Laptop',
                'price' => 38999000,
                'description' => 'Laptop convertible serbaguna dari Microsoft dengan layar sentuh 14.4 inci dan engsel dinamis.',
                'image' => '/images/products/surface-laptop-studio-2.jpg',
                'stock' => 6,
            ],
            [
                'name' => 'Acer Predator Helios 18',
                'slug' => 'acer-predator-helios-18',
                'category' => 'Laptop',
                'price' => 31999000,
                'description' => 'Laptop gaming layar raksasa 18 inci dengan refresh rate 250Hz dan sistem pendingin canggih.',
                'image' => '/images/products/acer-predator-helios-18.jpg',
                'stock' => 7,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
