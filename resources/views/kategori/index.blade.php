@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Kategori</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori Baru</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
        
        <!-- Search Bar -->
        <form action="{{ route('kategori.index') }}" method="GET" class="d-flex">
            <input 
                type="text" 
                name="search" 
                class="form-control me-2" 
                placeholder="Cari kategori..." 
                value="{{ $search ?? '' }}"
                style="width: 300px;">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Cari
            </button>
            @if(request('search'))
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary ms-2">Reset</a>
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
            ({{ $kategoris->total() }} data ditemukan)
        </div>
    @endif

    <!-- Tabel Data Kategori -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $index => $kategori)
                    <tr>
                        <td>{{ $kategoris->firstItem() + $index }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus kategori {{ $kategori->nama_kategori }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            @if(request('search'))
                                Tidak ada kategori yang sesuai dengan pencarian "{{ request('search') }}"
                            @else
                                Tidak ada data kategori
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted">
            Menampilkan {{ $kategoris->firstItem() ?? 0 }} sampai {{ $kategoris->lastItem() ?? 0 }} 
            dari {{ $kategoris->total() }} data
        </div>
        <nav aria-label="Page navigation">
            {{ $kategoris->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
        </nav>
    </div>
</div>
@endsection