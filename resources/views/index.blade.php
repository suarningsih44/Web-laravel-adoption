@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Data Adopsi</h2>
    <a href="{{ route('adopsi.create') }}" class="btn btn-primary mb-3">Tambah Adopsi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Hewan</th>
                <th>Nama Adopter</th>
                <th>Tanggal Adopsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adopsi as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->nama_hewan }}</td>
                <td>{{ $row->nama_adopter }}</td>
                <td>{{ $row->tanggal_adopsi }}</td>
                <td>{{ $row->status }}</td>
                <td>
                    <a href="{{ route('adopsi.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('adopsi.destroy', $row->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
