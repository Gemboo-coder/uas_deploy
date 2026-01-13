<?php
$target = '/home/saesidea/nusatrip/westes/storage/app/public';
$shortcut = '/home/saesidea/public_html/storage';

if (symlink($target, $shortcut)) {
    echo "Link Gambar Berhasil Dibuat!";
} else {
    echo "Gagal! Pastikan folder target ada dan folder shortcut sudah dihapus.";
}