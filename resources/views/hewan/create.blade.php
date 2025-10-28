@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Tambah Hewan Baru</h1>

    <form action="{{ route('hewan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_hewan" class="form-label">Nama Hewan</label>
            <input 
                type="text" 
                class="form-control @error('nama_hewan') is-invalid @enderror" 
                id="nama_hewan" 
                name="nama_hewan"
                value="{{ old('nama_hewan') }}" 
                required>
            @error('nama_hewan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_kategori') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea 
                class="form-control @error('deskripsi') is-invalid @enderror" 
                id="deskripsi" 
                name="deskripsi" 
                rows="3" 
                required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Diadopsi" {{ old('status') == 'Diadopsi' ? 'selected' : '' }}>Diadopsi</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="{{ route('hewan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection