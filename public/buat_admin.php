<?php
require __DIR__.'/../nusatrip/westes/vendor/autoload.php';
$app = require_once __DIR__.'/../nusatrip/westes/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

try {
    // Buat tabel users jika belum ada
    if (!Schema::hasTable('users')) {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }
    // Masukkan data Admin
    DB::table('users')->updateOrInsert(
        ['email' => 'admin@nusatrip.com'], // Ganti email Anda di sini
        [
            'name' => 'Admin NusaTrip',
            'password' => Hash::make('admin123'), // Ganti password Anda di sini
            'created_at' => now(),
            'updated_at' => now()
        ]
    );
    echo "Sistem Login Siap. User: admin@nusatrip.com | Pass: admin123. SEGERA HAPUS FILE INI!";
} catch (\Exception $e) { echo "Error: " . $e->getMessage(); }