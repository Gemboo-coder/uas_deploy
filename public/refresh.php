<?php
shell_exec('php ../nusatrip/westes/artisan route:clear');
shell_exec('php ../nusatrip/westes/artisan view:clear');
shell_exec('php ../nusatrip/westes/artisan config:clear');
echo "Cache Berhasil Dibersihkan!";