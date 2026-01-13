<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama_kategori', 'gambar_kategori'];

    // Relasi ke Destination
    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}       