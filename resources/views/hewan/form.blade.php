@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ isset($hewan) ? 'Edit Hewan' : 'Tambah Hewan Baru' }}</h1>

    <form 
        action="{{ isset($hewan) ? route('hewan.update', $hewan->id) : route('hewan.store') }}" 
        method="POST">
        @csrf
        @if(isset($hewan))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nama_hewan" class="form-label">Nama Hewan</label>
            <input 
                type="text" 
                class="form-control" 
                id="nama_hewan" 
                name="nama_hewan"
                value="{{ old('nama_hewan', $hewan->nama_hewan ?? '') }}" 
                required>
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select class="form-select" id="id_kategori" name="id_kategori" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" 
                        {{ (isset($hewan) && $hewan->id_kategori == $kategori->id) ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea 
                class="form-control" 
                id="deskripsi" 
                name="deskripsi" 
                rows="3" 
                required>{{ old('deskripsi', $hewan->deskripsi ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="{{ route('hewan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
 