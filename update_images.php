<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

$products = Product::all();

if ($products->isEmpty()) {
    echo "Tidak ada produk di database. Jalankan seeder dulu.\n";
    exit;
}

echo "Mulai update gambar produk...\n";

foreach ($products as $product) {
    if ($product->image && Storage::disk('public')->exists($product->image) && $product->image !== '') {
        echo "Produk {$product->name} sudah punya gambar, skip.\n";
        continue;
    }

    $imageName = $product->slug . '.jpg';
    $imagePath = 'products/' . $imageName;
    
    // Generate URL placeholder yang informatif
    // Warna background: Biru untuk HP, Dark untuk Laptop
    $bgColor = $product->category == 'HP' ? '2563eb' : '1f2937';
    $text = urlencode($product->name);
    
    $imageUrl = "https://placehold.co/600x600/{$bgColor}/FFFFFF.jpg?text={$text}";
    
    echo "Downloading image for {$product->name}...\n";
    
    try {
        $contents = file_get_contents($imageUrl);
        if ($contents !== false) {
            Storage::disk('public')->put($imagePath, $contents);
            
            // Update database
            $product->image = $imagePath;
            $product->save();
            
            echo "✔ Berhasil update gambar: {$product->name}\n";
        } else {
            echo "❌ Gagal download gambar: {$product->name}\n";
        }
    } catch (\Exception $e) {
        echo "❌ Error: " . $e->getMessage() . "\n";
    }
}

echo "Selesai!\n";
