@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Hewan</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="{{ route('hewan.create') }}" class="btn btn-primary">Tambah Hewan Baru</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
        
        <!-- Search Bar -->
        <form action="{{ route('hewan.index') }}" method="GET" class="d-flex">
            <input 
                type="text" 
                name="search" 
                class="form-control me-2" 
                placeholder="Cari nama hewan, kategori, atau deskripsi..." 
                value="{{ $search ?? '' }}"
                style="width: 350px;">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Cari
            </button>
            @if(request('search'))
                <a href="{{ route('hewan.index') }}" class="btn btn-secondary ms-2">Reset</a>
            @endif
        </form>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Informasi Hasil Pencarian -->
    @if(request('search'))
        <div class="alert alert-info">
            Menampilkan hasil pencarian untuk: <strong>{{ request('search') }}</strong>
            ({{ $hewans->total() }} data ditemukan)
        </div>
    @endif

    <!-- Tabel Data Hewan -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>Nama Hewan</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hewans as $index => $hewan)
                    <tr>
                        <td>{{ $hewans->firstItem() + $index }}</td>
                        <td>{{ $hewan->nama_hewan }}</td>
                        <td>{{ $hewan->kategori->nama_kategori }}</td>
                        <td>{{ $hewan->deskripsi }}</td>
                        <td>
                            <span class="badge {{ $hewan->status == 'Tersedia' ? 'bg-success' : 'bg-danger' }}">
                                {{ $hewan->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('hewan.edit', $hewan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('hewan.destroy', $hewan->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus {{ $hewan->nama_hewan }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            @if(request('search'))
                                Tidak ada data hewan yang sesuai dengan pencarian "{{ request('search') }}"
                            @else
                                Tidak ada data hewan
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination dengan styling yang lebih baik -->
<div class="d-flex justify-content-between align-items-center mt-4">
    <div class="text-muted">
        Menampilkan {{ $hewans->firstItem() ?? 0 }} sampai {{ $hewans->lastItem() ?? 0 }} 
        dari {{ $hewans->total() }} data
    </div>
    <nav aria-label="Page navigation">
        {{ $hewans->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
    </nav>
</div>
</div>
@endsection