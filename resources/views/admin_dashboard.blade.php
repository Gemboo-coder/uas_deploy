@extends('layout.layout')

@section('konten')
<style>
    /* 1. MENGHAPUS NAVBAR & FOOTER UTAMA */
    nav, .navbar, footer { display: none !important; } 

    body { background-color: #f1f5f9; }

    /* 2. HEADER ADMIN BARU */
    .admin-topbar {
        background: #0f172a; 
        color: white;
        padding: 15px 0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    /* 3. STYLING SEARCH DI SAMPING LOGOUT */
    .search-wrapper {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 6px;
        padding: 0 12px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .search-wrapper:focus-within {
        background: rgba(255, 255, 255, 0.2);
        border-color: #3b82f6;
    }

    .search-wrapper input {
        background: transparent;
        border: none;
        color: white;
        padding: 8px;
        outline: none;
        width: 180px; /* Ukuran pas agar muat di baris */
        transition: width 0.3s ease;
    }

    .search-wrapper input:focus {
        width: 240px;
    }

    .search-wrapper input::placeholder { color: rgba(255, 255, 255, 0.5); }

    /* 4. TABEL STYLING */
    .table img {
        width: 70px;
        height: 45px;
        object-fit: cover;
        border-radius: 4px;
    }
</style>

<div class="admin-topbar mb-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold mb-0">NusaTrip Admin</h4>
            
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-primary fw-bold px-3 me-2" data-bs-toggle="modal" data-bs-target="#modalTambahDestinasi">
                    <i class="bi bi-plus-lg"></i> Tambah
                </button>

                <form action="{{ url()->current() }}" method="GET" class="search-wrapper mb-0">
                    <i class="bi bi-search text-white-50"></i>
                    <input type="text" name="search" placeholder="Cari data..." value="{{ request('search') }}" autocomplete="off">
                    @if(request('search'))
                        <a href="{{ url()->current() }}" class="text-white-50 ms-1 text-decoration-none">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    @endif
                </form>

                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Keluar dari panel?')" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-danger fw-bold shadow-sm">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" width="100">Gambar</th>
                            <th width="200">Destinasi</th>
                            <th width="150">Kategori</th>
                            <th>Deskripsi</th>
                            <th class="text-center" width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($destinations as $dest)
                        <tr>
                            <td class="ps-4">
                                <img src="{{ asset('storage/' . $dest->gambar) }}" >
                            </td>
                            <td><span class="fw-bold">{{ $dest->nama_destinasi }}</span></td>
                            <td><span class="badge bg-info text-dark">{{ $dest->category->nama_kategori ?? 'Umum' }}</span></td>
                            <td><small class="text-muted">{{ Str::limit($dest->deskripsi_singkat, 80) }}</small></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.edit', $dest->id) }}" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('admin.destroy', $dest->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-search fs-1 d-block mb-3 opacity-25"></i>
                                Data "{{ request('search') }}" tidak ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($destinations->hasPages())
        <div class="card-footer bg-white py-3">
            {{ $destinations->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</div>
@endsection