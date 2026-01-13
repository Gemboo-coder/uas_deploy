@extends('layout.layout')
@section('konten')

<style>
    /* CSS Khusus untuk Header Banner */
    .hero-container {
        position: relative;
        height: 250px; 
        overflow: hidden;
        margin-bottom: 50px; 
    }

    .hero-img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        filter: brightness(70%); 
    }

    .hero-content-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
    }

    .breadcrumb-style {
        font-size: 0.8rem;
        letter-spacing: 2px;
        margin-bottom: 5px;
        color: rgba(255, 255, 255, 0.9);
        text-transform: uppercase;
    }

    .title-destinasi {
        font-family: 'Playfair Display', serif;
        font-size: 4rem;
        color: white;
        margin: 0;
    }

    .title-underline {
        width: 100px;
        height: 1px;
        background-color: rgba(255, 255, 255, 0.6);
        margin: 15px auto 0;
    }

    /* Styling Card: Bersih & Minimalis */
    .destinasi-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .destinasi-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        border: none;
    }

    .destinasi-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    .card-img-top {
        height: 250px;
        object-fit: cover;
    }

    /* Jarak Teks Kutipan */
    .quote-section {
        margin-bottom: 60px; 
    }

    .quote-text {
        font-style: italic;
        color: #555;
        line-height: 1.8;
    }
</style>

<div class="hero-container shadow-sm">
    <img src="{{ asset('images/4.jpg') }}" class="hero-img" alt="Banner Destinasi">
    <div class="hero-content-overlay">
        <p class="breadcrumb-style">NUSATRIP > DESTINASI</p>
        <h1 class="title-destinasi">Destinasi</h1>
        <div class="title-underline"></div>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center quote-section">
        <div class="col-lg-8 text-center">
            <p class="lead quote-text">
                "Temukan inspirasi perjalanan Anda berikutnya dengan panduan mendalam ke tempat-tempat paling menakjubkan di seluruh penjuru dunia."
            </p>
        </div>
    </div>

    <div class="row g-5">
        @foreach($destinations as $dest)
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('destinasi.show', $dest->id) }}" class="destinasi-link">
                <div class="card h-100 shadow-sm destinasi-card">
                    <img src="{{ asset('storage/' . $dest->gambar) }}" class="card-img-top" alt="{{ $dest->nama_destinasi }}">
                    
                    <div class="card-body p-4 text-center">
                        <h5 class="card-title fw-bold mb-3">{{ $dest->nama_destinasi }}</h5>
                        <p class="card-text text-muted small mb-0">
                            {{ Str::limit($dest->deskripsi_singkat, 120) }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-5 pt-4">
        {{ $destinations->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection