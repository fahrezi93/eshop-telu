<?php

$dir = __DIR__ . '/public/images/products';
$files = glob($dir . '/*.png');

foreach ($files as $file) {
    $basename = basename($file);
    
    // Check if file has timestamp format (ends with digits.png)
    if (preg_match('/^(.*)_(\d+)\.png$/', $basename, $matches)) {
        $namePart = $matches[1]; // e.g. google_pixel_8_pro
        
        // Convert snake_case to kebab-case
        $cleanName = str_replace('_', '-', $namePart);
        
        $newPath = $dir . '/' . $cleanName . '.png';
        
        if (rename($file, $newPath)) {
            echo "Renamed: $basename -> $cleanName.png\n";
        } else {
            echo "Failed to rename: $basename\n";
        }
    }
}

echo "Renaming complete. Starting optimization...\n";

// Now run the optimization logic (convert to JPG)
$files = glob($dir . '/*.png');
foreach ($files as $file) {
    $basename = basename($file);
    $jpgPath = str_replace('.png', '.jpg', $file);
    
    // Skip if JPG already exists and is newer? No, just overwrite to be safe
    
    echo "Processing $basename...\n";
    
    $content = file_get_contents($file);
    if (!$content) continue;
    
    // Create image
    $image = imagecreatefromstring($content);
    if (!$image) {
        echo "Error reading $basename\n";
        continue;
    }
    
    // Convert to JPG
    $width = imagesx($image);
    $height = imagesy($image);
    $outputImage = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($outputImage, 255, 255, 255);
    imagefilledrectangle($outputImage, 0, 0, $width, $height, $white);
    imagecopy($outputImage, $image, 0, 0, 0, 0, $width, $height);
    
    imagejpeg($outputImage, $jpgPath, 75); // 75% quality
    
    imagedestroy($image);
    imagedestroy($outputImage);
    
    echo "Optimized: " . basename($jpgPath) . "\n";
}
