@extends('layout.layout')

@section('konten')

<style>
    /* ===== HERO CAROUSEL ===== */
    .carousel-item {
        height: 600px; 
        background: #000;
        overflow: hidden;
    }
    .hero-img {
        height: 100%;
        object-fit: cover;
        filter: brightness(60%);
        transition: transform 3s ease; 
    }
    .carousel-item.active .hero-img {
        transform: scale(1.1);
    }
    .carousel-caption h5 {
        font-size: 3.5rem;
        font-weight: 700;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
    }

    /* ===== KATEGORI ===== */
    .kategori-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .kategori-item:hover .kategori-img {
        transform: scale(1.1);
    }
    .kategori-link {
        text-decoration: none;
        color: inherit;
    }
    .kategori-link:hover {
        color: #0d6efd;
    }

    /* ===== CARD STYLE ===== */
    .card-destinasi {
        transition: transform 0.3s ease;
        cursor: pointer;
    }
    .card-destinasi:hover {
        transform: translateY(-8px);
    }
    .card-destinasi img {
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }
    
    /* Pembatas teks untuk card kecil (2 baris) */
    .text-limit-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        font-size: 0.85rem;
        line-height: 1.5;
    }

    /* REVISI: Pembatas teks untuk konten bawah (4-5 baris) */
    .text-limit-long {
        display: -webkit-box;
        -webkit-line-clamp: 5; /* Menampilkan maksimal 5 baris */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-align: justify;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .destinasi-anchor {
        text-decoration: none;
        color: inherit;
    }
    .destinasi-anchor:hover {
        color: inherit;
    }
</style>

<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/rinjani.jpg') }}" class="d-block w-100 hero-img" alt="Rinjani">
            <div class="carousel-caption">
                <h5>Gunung Rinjani</h5>
                <p>Jelajahi keindahan atap Pulau Lombok yang memukau.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/bukit-merese.jpg') }}" class="d-block w-100 hero-img" alt="Merese">
            <div class="carousel-caption">
                <h5>Bukit Merese</h5>
                <p>Menikmati hamparan laut biru dari ketinggian bukit.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/gili.jpg') }}" class="d-block w-100 hero-img" alt="Gili">
            <div class="carousel-caption">
                <h5>Gili Trawangan</h5>
                <p>Ketenangan pulau tanpa kendaraan bermotor.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container text-center">
        <h5 class="section-title mb-4">Kategori</h5>
        <div class="row justify-content-center g-4">
            @foreach($categories as $cat)
                <div class="col-6 col-md-2 kategori-item">
                    <a href="{{ route('category.show', $cat->id) }}" class="kategori-link text-decoration-none">
                        {{-- Pastikan folder ada di: public/images/kategori/ --}}
                        <img src="{{ asset('images/kategori/' . $cat->id . '.jpg') }}" 
                             class="rounded-circle kategori-img shadow-sm border" 
                             alt="{{ $cat->nama_kategori }}"
                             style="width: 100px; height: 100px; object-fit: cover; transition: 0.3s;"
                             {{-- Jika ID.jpg tidak ada, dia lari ke default.jpg --}}
                             >
                        
                        <p class="kategori-title mt-2 fw-medium text-dark">{{ $cat->nama_kategori }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .kategori-img:hover {
        transform: scale(1.1);
        border-color: #0d6efd !important;
    }
    .kategori-link {
        display: block;
    }
</style>

<section class="py-4 bg-light">
    <div class="container">
        <h5 class="section-title">Paling Populer</h5>
        <div class="row g-4">
            @foreach($destinations->take(4) as $dest)
            <div class="col-6 col-md-3">
                <a href="{{ url('/destinasi/'.$dest->id) }}" class="destinasi-anchor">
                    <div class="card card-destinasi border-0 bg-transparent">
                        <img src="{{ asset('storage/' . $dest->gambar) }}" class="card-img-top shadow-sm mb-3" alt="{{ $dest->nama_destinasi }}">
                        <div class="card-body p-0">
                            <h6 class="fw-bold mb-1 text-dark">{{ $dest->nama_destinasi }}</h6>
                            <p class="text-muted text-limit-2">
                                {{ $dest->deskripsi_singkat }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h5 class="section-title">Jelajah</h5>
        <div class="row g-4">
            @foreach($destinations->skip(4)->take(4) as $dest)
            <div class="col-6 col-md-3">
                <a href="{{ url('/destinasi/'.$dest->id) }}" class="destinasi-anchor">
                    <div class="card card-destinasi border-0">
                        <img src="{{ asset('storage/' . $dest->gambar) }}" class="card-img-top shadow-sm mb-3" alt="{{ $dest->nama_destinasi }}">
                        <div class="card-body p-0">
                            <h6 class="fw-bold mb-1 text-dark">{{ $dest->nama_destinasi }}</h6>
                            <p class="text-muted text-limit-2">
                                {{ $dest->deskripsi_singkat }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 bg-white border-top">
    <div class="container">
        <h5 class="section-title text-center mb-5">Update Terbaru</h5>
        @forelse($destinations->take(2) as $index => $dest)
        <div class="row align-items-center mb-5 {{ $index % 2 != 0 ? 'flex-row-reverse' : '' }}">
            <div class="col-md-6">
                <a href="{{ url('/destinasi/'.$dest->id) }}">
                    <img src="{{ asset('storage/' . $dest->gambar) }}" class="img-fluid shadow rounded" style="height: 350px; width: 100%; object-fit: cover;" alt="{{ $dest->nama_destinasi }}">
                </a>
            </div>
            <div class="col-md-6 p-md-5">
                <h2 class="fw-bold">{{ $dest->nama_destinasi }}</h2>
                <p class="text-muted text-limit-long">
                    {{ $dest->deskripsi_singkat }}
                </p>
                <a href="{{ url('/destinasi/'.$dest->id) }}" class="btn btn-dark px-4 py-2 mt-3">Detail Selengkapnya</a>
            </div>
        </div>
        @empty
            <p class="text-center text-muted">Belum ada data inputan baru.</p>
        @endforelse
    </div>
</section>

@endsection