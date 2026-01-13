<?php
require __DIR__.'/../nusatrip/westes/vendor/autoload.php';
$app = require_once __DIR__.'/../nusatrip/westes/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$categories = \App\Models\Category::all();

echo "<h3>Daftar ID Kategori Anda:</h3>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Nama Kategori</th><th>Nama File yang Harus Disiapkan</th></tr>";
foreach ($categories as $cat) {
    echo "<tr>
            <td>{$cat->id}</td>
            <td>{$cat->nama_kategori}</td>
            <td><b>{$cat->id}.jpg</b></td>
          </tr>";
}
echo "</table>";