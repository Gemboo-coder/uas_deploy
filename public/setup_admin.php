<?php
// Load Laravel environment
require __DIR__.'/../nusatrip/westes/vendor/autoload.php';
$app = require_once __DIR__.'/../nusatrip/westes/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

try {
    // 1. Buat Tabel Users jika belum ada
    if (!Schema::hasTable('users')) {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        echo "Tabel 'users' berhasil dibuat!<br>";
    }

    // 2. Buat User Admin
    $email = 'admin@nusatrip.com'; // Ganti sesuai keinginan
    $userExists = User::where('email', $email)->first();

    if (!$userExists) {
        User::create([
            'name' => 'Administrator',
            'email' => $email,
            'password' => Hash::make('password123'), // Ganti sesuai keinginan
        ]);
        echo "User Admin berhasil dibuat!<br>Email: $email <br>Password: password123";
    } else {
        echo "User Admin sudah ada.";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}