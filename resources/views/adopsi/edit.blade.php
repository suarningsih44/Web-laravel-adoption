@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Data Adopsi</h1>

    <form action="{{ route('adopsi.update', $adopsi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Pilih Hewan -->
        <div class="mb-3">
            <label for="id_hewan" class="form-label">Nama Hewan:</label>
            <select name="id_hewan" id="id_hewan" class="form-select @error('id_hewan') is-invalid @enderror" required>
                <option value="">-- Pilih Nama Hewan --</option>
                @foreach ($hewans as $hewan)
                    <option value="{{ $hewan->id }}" 
                        {{ old('id_hewan', $adopsi->id_hewan) == $hewan->id ? 'selected' : '' }}>
                        {{ $hewan->nama_hewan }} ({{ $hewan->kategori->nama_kategori }})
                    </option>
                @endforeach
            </select>
            @error('id_hewan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Adopter -->
        <div class="mb-3">
            <label for="nama_adopter" class="form-label">Nama Adopter:</label>
            <input type="text" name="nama_adopter" id="nama_adopter" 
                   class="form-control @error('nama_adopter') is-invalid @enderror" 
                   value="{{ old('nama_adopter', $adopsi->nama_adopter) }}" required>
            @error('nama_adopter')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Adopsi -->
        <div class="mb-3">
            <label for="tanggal_adopsi" class="form-label">Tanggal Adopsi:</label>
            <input type="date" name="tanggal_adopsi" id="tanggal_adopsi" 
                   class="form-control @error('tanggal_adopsi') is-invalid @enderror" 
                   value="{{ old('tanggal_adopsi', $adopsi->tanggal_adopsi) }}" required>
            @error('tanggal_adopsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                <option value="Proses" {{ old('status', $adopsi->status) == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Selesai" {{ old('status', $adopsi->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('adopsi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection