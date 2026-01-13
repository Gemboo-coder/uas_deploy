@extends('layout.layout')

@section('konten')
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-white fw-bold">Edit Destinasi</div>
        <div class="card-body">
            <form action="{{ route('admin.update', $dest->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Nama Destinasi</label>
                    <input type="text" name="nama_destinasi" class="form-control" value="{{ $dest->nama_destinasi }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-select">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $dest->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Singkat</label>
                    <textarea name="deskripsi_singkat" class="form-control" rows="3">{{ $dest->deskripsi_singkat }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ganti Gambar (Kosongkan jika tidak ingin ganti)</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection