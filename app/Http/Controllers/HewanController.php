<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HewanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $hewans = Hewan::with('kategori')
            ->when($search, function($query, $search) {
                return $query->where('nama_hewan', 'like', "%{$search}%")
                            ->orWhere('deskripsi', 'like', "%{$search}%")
                            ->orWhereHas('kategori', function($q) use ($search) {
                                $q->where('nama_kategori', 'like', "%{$search}%");
                            });
            })
            ->paginate(10); // 10 data per halaman
        
        return view('hewan.index', compact('hewans', 'search'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('hewan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hewan' => 'required|string|max:255',
            'id_kategori' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        Hewan::create($request->all());
        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $hewan = Hewan::findOrFail($id);
        $kategoris = Kategori::all();
        return view('hewan.edit', compact('hewan', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_hewan' => 'required|string|max:255',
            'id_kategori' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        $hewan = Hewan::findOrFail($id);
        $hewan->update($request->all());
        
        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $hewan = Hewan::findOrFail($id);
        $hewan->delete();
        
        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil dihapus.');
    }
}