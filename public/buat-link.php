<?php
$target = '/home/saesidea/nusatrip/westes/storage/app/public';
$shortcut = '/home/saesidea/public_html/storage';

// Menghapus link lama jika ada agar tidak bentrok
if (is_link($shortcut) || file_exists($shortcut)) {
    rmdir($shortcut) || unlink($shortcut);
}

if (symlink($target, $shortcut)) {
    echo "<h1>Link Gambar Berhasil Dibuat!</h1>";
    echo "<p>Sekarang folder storage di public_html sudah terhubung ke proyek westes.</p>";
} else {
    echo "<h1>Gagal!</h1>";
    echo "<p>Pastikan folder 'nusatrip/westes/storage/app/public' sudah ada di File Manager.</p>";
}