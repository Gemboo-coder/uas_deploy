<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Destination;
class PariwisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat Kategori
        $pantai = Category::create(['nama_kategori' => 'Pantai', 'gambar_kategori' => 'images/4.jpg']);
        $gunung = Category::create(['nama_kategori' => 'Gunung', 'gambar_kategori' => 'images/3.jpg']);
        $air_terjun = Category::create(['nama_kategori' => 'Air Terjun', 'gambar_kategori' => 'images/gili.jpg']);
        $adat = Category::create(['nama_kategori' => 'Tempat Adat', 'gambar_kategori' => 'images/wanda.jpg']);
    
        // 2. Buat Destinasi (Contoh sesuai welcome.blade.php)
        Destination::create([
            'category_id' => $gunung->id,
            'nama_destinasi' => 'Gunung Rinjani',
            'deskripsi_singkat' => 'Jelajahi keindahan atap Pulau Lombok yang memukau.',
            'gambar' => 'images/rinjani.jpg'
        ]);
    
        Destination::create([
            'category_id' => $pantai->id,
            'nama_destinasi' => 'Gili Trawangan',
            'deskripsi_singkat' => 'Ketenangan pulau tanpa kendaraan bermotor.',
            'gambar' => 'images/gili.jpg'
        ]);
    }
}
