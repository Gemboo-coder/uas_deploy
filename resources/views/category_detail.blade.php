@extends('layout.layout')

@section('konten')
<style>
    .card-destinasi {
        transition: transform 0.3s ease;
        cursor: pointer;
        height: 100%;
    }
    .card-destinasi:hover {
        transform: translateY(-5px);
    }
    .destinasi-link {
        text-decoration: none;
        color: inherit;
    }
    .destinasi-link:hover {
        color: inherit;
    }
    .text-limit-2 {
        display: -webkit-box;
        -webkit-line-clamp: 3; 
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-align: justify;
    }
</style>

<div class="container py-5">
    <h2 class="fw-bold mb-4">Destinasi: {{ $category->nama_kategori }}</h2>
    <hr>
    
    <div class="row g-4">
        @forelse($destinations as $dest)
            <div class="col-6 col-md-3">
                <a href="{{ url('/destinasi/'.$dest->id) }}" class="destinasi-link">
                    <div class="card card-destinasi border-0 shadow-sm">
                        <img src="{{ asset('storage/' . $dest->gambar) }}" 
                             class="card-img-top" 
                             style="height: 200px; object-fit: cover;" 
                             alt="{{ $dest->nama_destinasi }}"
                             onerror="this.onerror=null;this.src='{{ asset('images/default.jpg') }}';">
                        
                        <div class="card-body p-3">
                            <h6 class="fw-bold mb-2">{{ $dest->nama_destinasi }}</h6>
                            <p class="text-muted small text-limit-2">
                                {{ $dest->deskripsi_singkat }}
                            </p>
                            <span class="text-primary small fw-bold">Lihat Detail →</span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted text-center py-5">Belum ada destinasi untuk kategori ini.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection