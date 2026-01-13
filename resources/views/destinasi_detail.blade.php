@extends('layout.layout')

@section('konten')
<style>
    /* Membuat pembungkus konten agar terpusat di tengah */
    .detail-centered-wrapper {
        max-width: 900px; /* Lebar maksimal agar tidak terlalu lebar di layar besar */
        margin: 0 auto;   /* Membuat konten berada di tengah */
    }

    .detail-img-main {
        width: 100%;      /* Gambar memenuhi lebar pembungkus */
        height: auto;     /* REVISI: Mengikuti tinggi asli secara proporsional */
        object-fit: contain; /* REVISI: Memastikan seluruh gambar terlihat tanpa terpotong */
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .breadcrumb-nav {
        font-size: 0.9rem;
        margin-bottom: 25px;
    }

    .title-text {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        margin-top: 20px;
    }
    
    /* Tambahan agar tampilan di mobile tetap cantik */
    @media (max-width: 768px) {
        .title-text {
            font-size: 2.2rem;
        }
    }
</style>

<div class="container py-5">
    <div class="detail-centered-wrapper">
        
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a></li>
                <li class="breadcrumb-item active text-primary fw-bold">
                    {{ $dest->nama_destinasi ?? 'Detail Destinasi' }}
                </li>
            </ol>
        </nav>

        @php
            $pathGambar = $dest->gambar ? asset('storage/' . $dest->gambar) : asset('images/default.jpg');
        @endphp
        
        <img src="{{ $pathGambar }}" 
             class="detail-img-main mb-5" 
             alt="{{ $dest->nama_destinasi ?? 'Gambar' }}">

        <div class="mb-4">
            <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">
                {{ $dest->category->nama_kategori ?? 'Kategori Umum' }}
            </span>
            <h1 class="title-text">{{ $dest->nama_destinasi ?? 'Nama Destinasi Tidak Ditemukan' }}</h1>
        </div>

        <div class="description-content" style="line-height: 2; font-size: 1.15rem; text-align: justify; color: #444;">
            {{-- Menggunakan nl2br untuk menjaga baris baru dari database --}}
            {!! nl2br(e($dest->deskripsi_singkat ?? 'Deskripsi belum tersedia.')) !!}
        </div>

        <div class="mt-5 pt-4 border-top text-center">
            <a href="javascript:history.back()" class="btn btn-outline-secondary px-5 rounded-pill">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection