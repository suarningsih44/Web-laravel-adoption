@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Tambah Kategori Baru</h1>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input 
                type="text" 
                class="form-control @error('nama_kategori') is-invalid @enderror" 
                id="nama_kategori" 
                name="nama_kategori"
                value="{{ old('nama_kategori') }}" 
                required>
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection