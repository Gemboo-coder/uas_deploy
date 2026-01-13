<?php
$target = '/home/saesidea/nusatrip/westes/storage/app/public';
$shortcut = '/home/saesidea/public_html/storage';

if (symlink($target, $shortcut)) {
    echo "Link storage berhasil dibuat!";
} else {
    echo "Gagal membuat link. Pastikan folder target ada.";
}