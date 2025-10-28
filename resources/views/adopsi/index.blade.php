@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Data Adopsi</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="{{ route('adopsi.create') }}" class="btn btn-primary">Tambah Adopsi</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
        
        <!-- Search Bar -->
        <form action="{{ route('adopsi.index') }}" method="GET" class="d-flex">
            <input 
                type="text" 
                name="search" 
                class="form-control me-2" 
                placeholder="Cari nama hewan, adopter, atau tanggal..." 
                value="{{ $search ?? '' }}"
                style="width: 350px;">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Cari
            </button>
            @if(request('search'))
                <a href="{{ route('adopsi.index') }}" class="btn btn-secondary ms-2">Reset</a>
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
            ({{ $adopsi->total() }} data ditemukan)
        </div>
    @endif

    <!-- Tabel Data Adopsi -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Hewan</th>
                    <th>Nama Adopter</th>
                    <th>Tanggal Adopsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($adopsi as $index => $a)
                    <tr>
                        <td>{{ $adopsi->firstItem() + $index }}</td>
                        <td>{{ $a->hewan->nama_hewan }}</td>
                        <td>{{ $a->nama_adopter }}</td>
                        <td>{{ \Carbon\Carbon::parse($a->tanggal_adopsi)->format('Y-m-d') }}</td>
                        <td>
                            <span class="badge {{ $a->status == 'Selesai' ? 'bg-success' : 'bg-warning' }}">
                                {{ $a->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('adopsi.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('adopsi.destroy', $a->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus data adopsi ini?');">
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
                                Tidak ada data adopsi yang sesuai dengan pencarian "{{ request('search') }}"
                            @else
                                Tidak ada data adopsi
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
            Menampilkan {{ $adopsi->firstItem() ?? 0 }} sampai {{ $adopsi->lastItem() ?? 0 }} 
            dari {{ $adopsi->total() }} data
        </div>
        <nav aria-label="Page navigation">
            {{ $adopsi->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
        </nav>
    </div>
</div>
@endsection