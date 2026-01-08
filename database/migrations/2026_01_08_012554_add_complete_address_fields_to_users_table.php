<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop old address column if exists
            if (Schema::hasColumn('users', 'address')) {
                $table->dropColumn('address');
            }
            
            // Add new detailed address fields
            $table->string('street_address')->nullable()->after('phone'); // Jalan & Nomor Rumah
            $table->string('rt_rw')->nullable()->after('street_address'); // RT/RW
            $table->string('kelurahan')->nullable()->after('rt_rw'); // Kelurahan/Desa
            $table->string('kecamatan')->nullable()->after('kelurahan'); // Kecamatan
            $table->string('city')->nullable()->after('kecamatan'); // Kota/Kabupaten
            $table->string('province')->nullable()->after('city'); // Provinsi
            $table->string('postal_code', 10)->nullable()->after('province'); // Kode Pos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'street_address',
                'rt_rw', 
                'kelurahan',
                'kecamatan',
                'city',
                'province',
                'postal_code'
            ]);
            
            // Restore old address column
            $table->text('address')->nullable();
        });
    }
};
