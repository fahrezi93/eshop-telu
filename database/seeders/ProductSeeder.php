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
                'description' => 'iPhone 15 Pro Max adalah flagship terbaru dari Apple yang menghadirkan performa luar biasa dengan chip A17 Pro 3nm pertama di industri smartphone.

**Fitur Utama:**
• **Chip A17 Pro** - Prosesor 3nm pertama dengan GPU 6-core untuk gaming console-level
• **Layar Super Retina XDR 6.7"** - ProMotion 120Hz, Always-On Display, 2000 nits outdoor
• **Sistem Kamera Pro** - Main 48MP, Ultra Wide 12MP, Telephoto 5x optical zoom 12MP
• **Bodi Titanium Grade 5** - Lebih ringan dan kuat dari stainless steel
• **USB-C & USB 3** - Transfer data hingga 10Gbps, mendukung ProRes recording eksternal
• **Action Button** - Tombol customizable menggantikan silent switch
• **Baterai Tahan Lama** - Hingga 29 jam video playback
• **5G & Wi-Fi 6E** - Konektivitas super cepat
• **Ceramic Shield** - Pelindung layar terkuat di smartphone Apple
• **Emergency SOS via Satellite** - Fitur keselamatan di lokasi tanpa sinyal',
                'image' => '/images/products/iphone-15-pro-max.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'slug' => 'samsung-galaxy-s24-ultra',
                'category' => 'HP',
                'price' => 19999000,
                'description' => 'Samsung Galaxy S24 Ultra adalah smartphone AI pertama dari Samsung dengan Galaxy AI yang revolusioner, menghadirkan pengalaman mobile paling cerdas.

**Fitur Utama:**
• **Snapdragon 8 Gen 3 for Galaxy** - Prosesor teroptimasi khusus untuk Samsung
• **Galaxy AI** - Circle to Search, Live Translate, Chat Assist, Note Assist
• **Layar Dynamic AMOLED 2X 6.8"** - QHD+, 120Hz, 2600 nits, Gorilla Armor anti-reflective
• **Kamera 200MP** - Sensor terbesar dengan AI photo enhancement
• **S Pen Built-in** - Latensi 2.8ms untuk pengalaman menulis natural
• **Bodi Titanium** - Frame titanium premium dengan Corning Gorilla Armor
• **Baterai 5000mAh** - Fast charging 45W, wireless charging 15W
• **RAM 12GB + Storage 256GB/512GB/1TB** - Performa multitasking maksimal
• **IP68 Water Resistant** - Tahan air dan debu
• **One UI 6.1** - Berbasis Android 14 dengan 7 tahun update OS',
                'image' => '/images/products/samsung-galaxy-s24-ultra.jpg',
                'stock' => 15,
            ],
            [
                'name' => 'Xiaomi 14 Ultra',
                'slug' => 'xiaomi-14-ultra',
                'category' => 'HP',
                'price' => 14999000,
                'description' => 'Xiaomi 14 Ultra adalah masterpiece fotografi mobile hasil kolaborasi dengan Leica, menghadirkan sistem kamera profesional dalam genggaman.

**Fitur Utama:**
• **Snapdragon 8 Gen 3** - Performa flagship terkencang dengan efisiensi tinggi
• **Leica Summilux Optics** - 4 kamera dengan aperture variabel f/1.63-f/4.0
• **Sensor Sony LYT-900 1"** - Sensor kamera terbesar di smartphone
• **Layar AMOLED 6.73"** - LTPO 120Hz, 3000 nits, Dolby Vision, HDR10+
• **HyperCharge 90W** - Pengisian penuh hanya 36 menit
• **Wireless Charging 80W** - Tercepat di kelasnya
• **RAM 16GB LPDDR5X** - Multitasking tanpa hambatan
• **Storage 512GB UFS 4.0** - Penyimpanan super cepat
• **Baterai 5000mAh Silicon-Carbon** - Teknologi baterai terbaru
• **Photography Kit** - Aksesoris grip dan filter profesional opsional
• **IP68 Rating** - Tahan air dan debu',
                'image' => '/images/products/xiaomi-14-ultra.jpg',
                'stock' => 20,
            ],
            [
                'name' => 'OPPO Find X7 Ultra',
                'slug' => 'oppo-find-x7-ultra',
                'category' => 'HP',
                'price' => 16999000,
                'description' => 'OPPO Find X7 Ultra menghadirkan sistem dual periscope pertama di dunia dengan kolaborasi Hasselblad untuk fotografi profesional.

**Fitur Utama:**
• **Dual Periscope Camera** - Telephoto 3x dan 6x untuk versatilitas zoom maksimal
• **Hasselblad Master Camera** - Color science dan portrait mode kelas profesional
• **Sensor Sony LYT-900 1"** - Main camera 50MP dengan low-light excellence
• **Dimensity 9300** - Prosesor flagship MediaTek terkuat
• **Layar AMOLED 6.82"** - LTPO 120Hz, 4500 nits peak brightness
• **SUPERVOOC 100W** - Pengisian tercepat, 0-100% dalam 25 menit
• **Baterai 5600mAh** - Kapasitas jumbo untuk pemakaian seharian penuh
• **RAM 16GB + Storage 512GB** - Konfigurasi flagship maksimal
• **Alert Slider** - Tombol profil suara ala OnePlus
• **ColorOS 14** - Berbasis Android 14 dengan AI features
• **IP68 + IP69** - Perlindungan air dan debu tingkat tertinggi',
                'image' => '/images/products/oppo-find-x7-ultra.jpg',
                'stock' => 12,
            ],
            [
                'name' => 'MacBook Pro 14 M3 Pro',
                'slug' => 'macbook-pro-14-m3-pro',
                'category' => 'Laptop',
                'price' => 32999000,
                'description' => 'MacBook Pro 14" dengan chip M3 Pro menghadirkan performa profesional luar biasa untuk developer, kreator konten, dan profesional kreatif.

**Fitur Utama:**
• **Chip Apple M3 Pro** - CPU 12-core (6 performance + 6 efficiency) dan GPU 18-core
• **Neural Engine 16-core** - Akselerasi machine learning hingga 15x lebih cepat
• **RAM Unified Memory 18GB** - Bandwidth memori 150GB/s
• **SSD 512GB** - Kecepatan baca/tulis hingga 7.4GB/s
• **Layar Liquid Retina XDR 14.2"** - 3024x1964, ProMotion 120Hz, 1600 nits HDR
• **Mini-LED Backlight** - 1000000:1 contrast ratio, XDR brightness
• **Baterai 17 jam** - Video playback hingga 17 jam
• **MagSafe 3 Charging** - Fast charge 50% dalam 30 menit
• **Port Lengkap** - HDMI 2.1, SDXC slot, 3x Thunderbolt 4, MagSafe, headphone jack
• **Speaker 6-speaker** - Spatial Audio dengan Dolby Atmos
• **Webcam 1080p FaceTime HD** - Advanced ISP untuk low-light performance
• **macOS Sonoma** - Optimized untuk Apple Silicon',
                'image' => '/images/products/macbook-pro-14-m3-pro.jpg',
                'stock' => 5,
            ],
            [
                'name' => 'ASUS ROG Strix G16',
                'slug' => 'asus-rog-strix-g16',
                'category' => 'Laptop',
                'price' => 24999000,
                'description' => 'ASUS ROG Strix G16 adalah laptop gaming powerful dengan desain yang berani dan performa tanpa kompromi untuk gamers serius.

**Fitur Utama:**
• **Intel Core i9-14900HX** - Prosesor desktop-class dengan 24 cores (8P+16E)
• **NVIDIA GeForce RTX 4070** - Ray tracing, DLSS 3, 8GB GDDR6
• **RAM 16GB DDR5 5600MHz** - Upgradeable hingga 32GB
• **SSD 1TB PCIe 4.0 NVMe** - Slot tambahan untuk ekspansi storage
• **Layar 16" QHD+ 240Hz** - 2560x1600, 100% DCI-P3, G-Sync, 3ms response time
• **ROG Intelligent Cooling** - Liquid metal thermal compound, dual fans
• **Aura Sync RGB** - Keyboard per-key RGB dengan Aura Creator
• **Dolby Atmos Audio** - Speaker stereo dengan Smart Amp technology
• **MUX Switch** - Direct GPU mode untuk performa gaming maksimal
• **90Wh Battery** - USB-C PD charging support
• **Wi-Fi 6E + Bluetooth 5.3** - Low latency gaming wireless
• **Thunderbolt 4** - Port versatile untuk docking dan display',
                'image' => '/images/products/asus-rog-strix-g16.jpg',
                'stock' => 8,
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon Gen 11',
                'slug' => 'lenovo-thinkpad-x1-carbon',
                'category' => 'Laptop',
                'price' => 28999000,
                'description' => 'Lenovo ThinkPad X1 Carbon Gen 11 adalah laptop bisnis ultralight paling ikonik dengan keandalan kelas enterprise dan keamanan tingkat militer.

**Fitur Utama:**
• **Intel Core Ultra 7 155H** - Prosesor AI-ready dengan NPU terintegrasi
• **Intel Arc Graphics** - Performa grafis terintegrasi terbaik
• **RAM 32GB LPDDR5** - Soldered untuk keamanan dan kecepatan
• **SSD 512GB PCIe Gen4** - Kecepatan dan keamanan dengan OPAL encryption
• **Layar 14" 2.8K OLED** - 2880x1800, 120Hz, 100% DCI-P3, 400 nits, anti-glare
• **Bodi Carbon Fiber** - Berat hanya 1.12kg, MIL-STD-810H certified
• **Baterai 57Wh** - Hingga 15 jam pemakaian, Rapid Charge 80% dalam 1 jam
• **ThinkPad Keyboard** - Keyboard terbaik di kelasnya dengan backlight
• **TrackPoint + Precision Touchpad** - Dual pointing device
• **Keamanan Enterprise** - Fingerprint, IR camera, dTPM 2.0, Kensington lock
• **Thunderbolt 4 x2** - Docking dan display support
• **5G WWAN Optional** - Konektivitas mobile untuk road warriors',
                'image' => '/images/products/lenovo-thinkpad-x1-carbon.jpg',
                'stock' => 7,
            ],
            [
                'name' => 'HP Spectre x360 16',
                'slug' => 'hp-spectre-x360-16',
                'category' => 'Laptop',
                'price' => 26999000,
                'description' => 'HP Spectre x360 16 adalah laptop convertible premium dengan desain gem-cut elegan dan layar OLED memukau untuk kreator dan profesional.

**Fitur Utama:**
• **Intel Core Ultra 7 155H** - Prosesor hybrid dengan AI capabilities
• **Intel Arc Graphics** - Performa grafis untuk creative workflows
• **RAM 16GB LPDDR5** - Multitasking smooth untuk aplikasi berat
• **SSD 1TB PCIe Gen4** - Storage luas dan cepat
• **Layar 16" 3K+ OLED** - 3072x1920, 120Hz, 100% DCI-P3, 400 nits, touch + pen
• **360° Hinge** - Mode laptop, tent, stand, dan tablet
• **HP MPP 2.0 Pen** - Stylus magnetik untuk sketching dan note-taking
• **Baterai 83Wh** - Hingga 16 jam mixed usage
• **Bang & Olufsen Audio** - Quad speakers dengan tuning premium
• **GlamCam 9MP** - Webcam terbaik dengan auto-framing AI
• **Desain Gem-Cut** - Nightfall Black dengan aksen copper luxury
• **Thunderbolt 4 x2 + USB-A** - Konektivitas lengkap
• **Wi-Fi 6E + Bluetooth 5.3** - Wireless terkini',
                'image' => '/images/products/hp-spectre-x360-16.jpg',
                'stock' => 6,
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'slug' => 'google-pixel-8-pro',
                'category' => 'HP',
                'price' => 17999000,
                'description' => 'Google Pixel 8 Pro adalah smartphone dengan AI paling canggih, menghadirkan pengalaman fotografi computational terbaik dan 7 tahun software updates.

**Fitur Utama:**
• **Google Tensor G3** - Chip custom Google dengan AI/ML terintegrasi
• **Titan M2 Security Chip** - Keamanan hardware-level terbaik
• **Layar Super Actua 6.7"** - LTPO OLED 120Hz, 2400 nits, 1-120Hz adaptive
• **Main Camera 50MP** - Sensor Samsung GNV dengan Super Res Zoom 30x
• **Ultra Wide 48MP** - Macro focus dan foto arsitektur
• **Telephoto 48MP** - 5x optical zoom dengan OIS
• **Magic Eraser & Photo Unblur** - AI photo editing features
• **Best Take** - Kombinasi foto terbaik dari beberapa shots
• **Audio Magic Eraser** - Hapus noise dari video
• **Call Screen & Hold for Me** - Fitur AI untuk telepon
• **7 Tahun OS & Security Updates** - Longest support di Android
• **Baterai 5050mAh** - 30W wired, 23W wireless charging
• **IP68 + Gorilla Glass Victus 2** - Durabilitas premium',
                'image' => '/images/products/google-pixel-8-pro.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Asus Zenfone 10',
                'slug' => 'asus-zenfone-10',
                'category' => 'HP',
                'price' => 11999000,
                'description' => 'Asus Zenfone 10 adalah flagship compact terbaik dengan performa full-size dalam bodi yang nyaman digenggam satu tangan.

**Fitur Utama:**
• **Snapdragon 8 Gen 2** - Flagship processor dalam body compact
• **Layar AMOLED 5.9"** - 144Hz, HDR10+, 1100 nits, Gorilla Glass Victus
• **Main Camera 50MP Sony IMX766** - OIS 6-axis Hybrid Gimbal Stabilizer
• **Ultra Wide 13MP** - 120° field of view dengan macro mode
• **RAM 8GB/16GB LPDDR5X** - Opsi untuk power user
• **Storage 256GB/512GB UFS 4.0** - Kecepatan storage maksimal
• **Baterai 4300mAh** - 30W HyperCharge, 15W wireless
• **Dual Stereo Speakers** - Dirac HD Sound tuning
• **3.5mm Headphone Jack** - Langka di flagship modern
• **ZenUI berbasis Android 14** - Clean dan fast
• **IP68 Water Resistant** - Tahan air dan debu
• **Berat hanya 172g** - Salah satu flagship paling ringan',
                'image' => '/images/products/asus-zenfone-10.jpg',
                'stock' => 15,
            ],
            [
                'name' => 'Sony Xperia 1 V',
                'slug' => 'sony-xperia-1-v',
                'category' => 'HP',
                'price' => 20999000,
                'description' => 'Sony Xperia 1 V adalah smartphone untuk kreator profesional dengan teknologi kamera Alpha dan layar 4K OLED cinematik.

**Fitur Utama:**
• **Snapdragon 8 Gen 2** - Performa flagship untuk content creation
• **Sensor Exmor T for Mobile** - Sensor dual-layer baru dengan 2x low-light sensitivity
• **Layar 4K HDR OLED 6.5"** - 3840x1644, 21:9 CinemaWide, 120Hz, Creator mode
• **Real-time Eye AF** - Human dan animal eye tracking seperti kamera Alpha
• **Videography Pro** - UI mirip kamera profesional Sony
• **Cinema Pro by CineAlta** - Rekam video dengan color science profesional
• **Audio 360 Reality Audio** - Immersive spatial audio
• **3.5mm Jack + LDAC** - Audio enthusiast friendly
• **Front Stereo Speakers** - Full-stage stereo sound
• **Baterai 5000mAh** - Fast charge 30W, wireless charging
• **RAM 12GB + Storage 256GB** - Expandable via microSD
• **IP65/68 Rating** - Tahan air dan debu
• **Gaming Mode** - 240Hz touch sampling, heat suppression',
                'image' => '/images/products/sony-xperia-1-v.jpg',
                'stock' => 5,
            ],
            [
                'name' => 'Vivo X100 Pro',
                'slug' => 'vivo-x100-pro',
                'category' => 'HP',
                'price' => 16499000,
                'description' => 'Vivo X100 Pro adalah smartphone fotografi flagship dengan lensa ZEISS APO terbaik dan chip Dimensity 9300 untuk performa maksimal.

**Fitur Utama:**
• **MediaTek Dimensity 9300** - All big-core architecture untuk performa tertinggi
• **ZEISS T* Coating** - Anti-reflective coating untuk foto lebih jernih
• **Main Camera 50MP** - Sensor Sony LYT-900 1-inch dengan OIS
• **Portrait Telephoto 50MP** - ZEISS APO Floating Telephoto 100mm equivalent
• **Ultra Wide 50MP** - Samsung JN1 sensor untuk landscape
• **ZEISS Multifocal Portrait** - 24mm, 35mm, 50mm, 85mm, 100mm modes
• **Layar AMOLED 6.78"** - LTPO 120Hz, 3000 nits, 2800x1260
• **Baterai 5400mAh BlueVolt** - Kapasitas besar dengan fast charging 100W
• **RAM 16GB LPDDR5T** - Memory generasi terbaru
• **Storage 512GB UFS 4.0** - Kecepatan transfer tinggi
• **V3 Imaging Chip** - Co-processor untuk computational photography
• **OriginOS 4 berbasis Android 14** - Optimized untuk fotografi
• **IP68 Water Resistant** - Perlindungan dari air dan debu',
                'image' => '/images/products/vivo-x100-pro.jpg',
                'stock' => 8,
            ],
            [
                'name' => 'Dell XPS 15',
                'slug' => 'dell-xps-15',
                'category' => 'Laptop',
                'price' => 35999000,
                'description' => 'Dell XPS 15 adalah laptop creator premium dengan InfinityEdge display memukau dan performa untuk video editing, 3D rendering, dan creative work.

**Fitur Utama:**
• **Intel Core i9-13900H** - 14 cores (6P+8E) untuk performa rendering tinggi
• **NVIDIA GeForce RTX 4060** - Studio drivers untuk Adobe, DaVinci, Blender
• **RAM 32GB DDR5 4800MHz** - Dual channel untuk workflow berat
• **SSD 1TB PCIe 4.0 NVMe** - Kecepatan hingga 7000MB/s
• **Layar 15.6" 3.5K OLED** - 3456x2160, 100% DCI-P3, 400 nits, touch optional
• **InfinityEdge Display** - 4-sided narrow bezel untuk immersive viewing
• **Bodi CNC Aluminum + Carbon Fiber** - Premium build, berat 1.86kg
• **Baterai 86Wh** - Hingga 13 jam battery life
• **Thunderbolt 4 x2 + USB-C** - Docking dan external GPU support
• **Killer Wi-Fi 6E AX1675** - Low latency wireless
• **Quad Speakers** - Waves MaxxAudio Pro tuning
• **Windows 11 Pro** - Productivity dan creative tools',
                'image' => '/images/products/dell-xps-15.jpg',
                'stock' => 4,
            ],
            [
                'name' => 'Razer Blade 16',
                'slug' => 'razer-blade-16',
                'category' => 'Laptop',
                'price' => 45999000,
                'description' => 'Razer Blade 16 adalah laptop gaming dan creator ultimate dengan layar Dual Mode revolusioner dan performa desktop RTX 4090 dalam bodi tipis.

**Fitur Utama:**
• **Intel Core i9-14900HX** - Prosesor mobile terkuat dengan 24 cores
• **NVIDIA GeForce RTX 4090** - GPU mobile paling powerful, 16GB GDDR6
• **RAM 32GB DDR5 5600MHz** - Dual channel untuk gaming dan rendering
• **SSD 2TB PCIe 4.0 NVMe** - Storage luas untuk game library
• **Layar 16" Dual Mode** - Switch antara UHD+ 120Hz dan FHD+ 240Hz
• **100% DCI-P3 + 100% Adobe RGB** - Color accuracy untuk creator
• **Vapor Chamber Cooling** - Sistem pendingin advanced untuk sustained performance
• **THX Spatial Audio** - Immersive gaming audio
• **Per-Key RGB Keyboard** - Razer Chroma dengan anti-ghosting
• **CNC Aluminum Unibody** - Build quality premium, anodized black finish
• **Baterai 95.2Wh** - Kapasitas maksimal legal untuk pesawat
• **Thunderbolt 4 + UHS-II SD** - Port lengkap untuk productivity
• **Windows 11 Home** - Optimized untuk gaming',
                'image' => '/images/products/razer-blade-16.jpg',
                'stock' => 3,
            ],
            [
                'name' => 'Surface Laptop Studio 2',
                'slug' => 'surface-laptop-studio-2',
                'category' => 'Laptop',
                'price' => 38999000,
                'description' => 'Microsoft Surface Laptop Studio 2 adalah laptop convertible serbaguna dengan Dynamic Woven Hinge untuk kreator, developer, dan profesional.

**Fitur Utama:**
• **Intel Core i7-13700H** - 14 cores untuk performa multitasking
• **NVIDIA GeForce RTX 4060** - Ray tracing dan AI acceleration
• **RAM 32GB LPDDR5x** - Fast memory untuk creative apps
• **SSD 1TB Removable** - Upgradeable dan secure
• **Layar 14.4" PixelSense Flow** - 2400x1600, 120Hz, Dolby Vision, touch + pen
• **Dynamic Woven Hinge** - 3 modes: Laptop, Stage, Studio
• **Surface Slim Pen 2** - Haptic feedback, stored under keyboard
• **Thunderbolt 4 x2** - External GPU dan docking support
• **USB-A Port** - Backward compatibility
• **Surface Connect** - Fast charging proprietary port
• **Quad Omnisonic Speakers** - Dolby Atmos support
• **Webcam 1080p + Windows Hello IR** - Video call excellence
• **Wi-Fi 6E + Bluetooth 5.1** - Latest wireless standards
• **Windows 11 Pro** - Full Microsoft ecosystem integration',
                'image' => '/images/products/surface-laptop-studio-2.jpg',
                'stock' => 6,
            ],
            [
                'name' => 'Acer Predator Helios 18',
                'slug' => 'acer-predator-helios-18',
                'category' => 'Laptop',
                'price' => 31999000,
                'description' => 'Acer Predator Helios 18 adalah laptop gaming layar jumbo 18 inci dengan performa brutal dan sistem pendingin AeroBlade terdepan.

**Fitur Utama:**
• **Intel Core i9-14900HX** - 24 cores untuk gaming dan streaming simultan
• **NVIDIA GeForce RTX 4080** - 12GB GDDR6 untuk gaming 4K dan ray tracing
• **RAM 32GB DDR5 5600MHz** - Dual channel, upgradeable hingga 64GB
• **SSD 1TB PCIe Gen4 + Slot NVMe** - RAID 0 support untuk kecepatan maksimal
• **Layar 18" WQXGA 250Hz** - 2560x1600, 100% DCI-P3, 3ms, G-Sync
• **AeroBlade 3D Fan** - 5th gen metal fans dengan 89 blades
• **Liquid Metal Thermal** - Predator PowerGem untuk heat dissipation
• **5-Zone RGB Keyboard** - MagKey mechanical-like switches
• **DTS:X Ultra Audio** - Immersive surround sound
• **Killer DoubleShot Pro** - WiFi 6E + 2.5G Ethernet simultan
• **MUX Switch + NVIDIA Advanced Optimus** - GPU switching otomatis
• **Thunderbolt 4 + Mini DP 1.4** - Multi-display setup
• **PredatorSense** - Software kontrol overclock dan RGB',
                'image' => '/images/products/acer-predator-helios-18.jpg',
                'stock' => 7,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}
