<?php

$dir = __DIR__ . '/public/images/products';
$files = glob($dir . '/*.png');

foreach ($files as $file) {
    echo "Processing " . basename($file) . "...\n";
    
    // Coba baca sebagai string dulu untuk cek header
    $content = file_get_contents($file);
    if (substr($content, 0, 8) !== "\x89PNG\x0d\x0a\x1a\x0a") {
        echo "Error: Header file tidak valid untuk PNG standard.\n";
        // Coba create image from string
        $image = imagecreatefromstring($content);
    } else {
        $image = imagecreatefrompng($file);
    }

    if (!$image) {
        echo "Gagal memproses gambar: " . basename($file) . "\n";
        continue;
    }
    
    // Buat canvas putih baru (karena JPG tidak support transparan)
    $width = imagesx($image);
    $height = imagesy($image);
    $outputImage = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($outputImage, 255, 255, 255);
    imagefilledrectangle($outputImage, 0, 0, $width, $height, $white);
    
    // Copy gambar asli ke canvas putih
    imagecopy($outputImage, $image, 0, 0, 0, 0, $width, $height);
    
    // Output path with .jpg extension
    $outputPath = str_replace('.png', '.jpg', $file);
    
    // Convert to JPG with 70% quality (Cukup bagus untuk web & cepat load)
    imagejpeg($outputImage, $outputPath, 75);
    
    // Free up memory
    imagedestroy($image);
    imagedestroy($outputImage);
    
    echo "Converted: " . basename($file) . " -> " . basename($outputPath) . "\n";
}

echo "All images optimized to JPG!\n";
