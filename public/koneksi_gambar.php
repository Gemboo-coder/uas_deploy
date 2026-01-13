<?php
$target = '/home/saesidea/nusatrip/westes/storage/app/public';
$shortcut = '/home/saesidea/public_html/storage';

if (symlink($target, $shortcut)) {
    echo "<h1>Berhasil!</h1><p>Link gambar telah dibuat. Silakan cek website Anda.</p>";
} else {
    echo "<h1>Gagal!</h1><p>Pastikan folder '/home/saesidea/nusatrip/westes/storage/app/public' memang ada.</p>";
}