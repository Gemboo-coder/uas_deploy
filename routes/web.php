<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Guest Routes (Bisa diakses semua orang tanpa login)
|--------------------------------------------------------------------------
*/

// Halaman Utama & About
Route::get('/', [PariwisataController::class, 'index']);
Route::get('/about', function () {
    return view('about');
});

// Halaman Destinasi (Daftar, Detail, & Filter Kategori)
Route::get('/destinasi', [PariwisataController::class, 'allDestinations'])->name('destinasi.index');
Route::get('/destinasi/{id}', [PariwisataController::class, 'show'])->name('destinasi.show');
Route::get('/kategori/{id}', [PariwisataController::class, 'categoryShow'])->name('category.show');

// Route Login (Ketik manual: domain.com/login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes (Hanya bisa diakses jika sudah Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // Dashboard Admin
    Route::get('/admin/dashboard', [PariwisataController::class, 'adminIndex'])->name('admin.index');

    // CRUD Destinasi
    Route::post('/destinasi/store', [PariwisataController::class, 'store'])->name('destinasi.store');
    Route::get('/admin/destinasi/edit/{id}', [PariwisataController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/destinasi/update/{id}', [PariwisataController::class, 'update'])->name('admin.update');
    Route::delete('/admin/destinasi/{id}', [PariwisataController::class, 'destroy'])->name('admin.destroy');

});


/*
|--------------------------------------------------------------------------
| Route Pancingan Tambah Kategori (Temporary)
|--------------------------------------------------------------------------
*/
use App\Models\Category;

Route::get('/gas-kategori', function () {
    try {
        // Menambah kategori baru ke SQLite
        $kategori = Category::updateOrCreate(
            ['nama_kategori' => 'Pemandian Alam'],
            ['gambar_kategori' => 'images/kategori/pemandian.jpg'] // Ini formalitas di DB
        );
        
        return "
            <div style='font-family:sans-serif; padding:20px; border:2px solid #28a745; border-radius:10px;'>
                <h2 style='color:#28a745;'>✅ Berhasil Cok!</h2>
                <p>Kategori: <b>" . $kategori->nama_kategori . "</b></p>
                <p>Dapat ID: <b style='font-size:24px; color:red;'>" . $kategori->id . "</b></p>
                <hr>
                <p><b>Langkah selanjutnya:</b></p>
                <ol>
                    <li>Buka File Manager cPanel.</li>
                    <li>Cari folder <b>public/images/kategori/</b>.</li>
                    <li>Upload foto pemandianmu ke situ.</li>
                    <li>Ganti nama fotonya menjadi: <b>" . $kategori->id . ".jpg</b> (sesuai ID di atas).</li>
                </ol>
                <p style='color:gray; font-size:12px;'>*Segera hapus route ini dari web.php jika sudah muncul.</p>
            </div>
        ";
    } catch (\Exception $e) {
        return "Gagal cok! Error: " . $e->getMessage();
    }
});