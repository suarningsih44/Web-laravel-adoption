<?php

namespace App\Http\Controllers;

use App\Models\Adopsi;
use App\Models\Hewan;
use Illuminate\Http\Request;

class AdopsiController extends Controller
{
    // ===============================
    // TAMPIL DATA ADOPSI
    // ===============================
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $adopsi = Adopsi::with('hewan')
            ->when($search, function($query, $search) {
                return $query->where('nama_adopter', 'like', "%{$search}%")
                            ->orWhere('tanggal_adopsi', 'like', "%{$search}%")
                            ->orWhere('status', 'like', "%{$search}%")
                            ->orWhereHas('hewan', function($q) use ($search) {
                                $q->where('nama_hewan', 'like', "%{$search}%");
                            });
            })
            ->orderBy('tanggal_adopsi', 'DESC')
            ->paginate(10); // 10 data per halaman
        
        return view('adopsi.index', compact('adopsi', 'search'));
    }

    // ===============================
    // FORM TAMBAH
    // ===============================
    public function create()
    {
        // Ambil hewan yang belum diadopsi atau status tersedia
        $hewans = Hewan::where('status', 'Tersedia')->get();
        return view('adopsi.create', compact('hewans'));
    }

    // ===============================
    // SIMPAN DATA ADOPSI
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'id_hewan' => 'required|exists:hewan,id',
            'nama_adopter' => 'required|string|max:255',
            'tanggal_adopsi' => 'required|date',
            'status' => 'required|string'
        ]);

        // Simpan data adopsi
        Adopsi::createAdopsi($request->all());

        // Update status hewan menjadi "Diadopsi"
        $hewan = Hewan::findOrFail($request->id_hewan);
        $hewan->update(['status' => 'Diadopsi']);

        return redirect()->route('adopsi.index')
                        ->with('success', 'Data adopsi berhasil ditambahkan.');
    }

    // ===============================
    // FORM EDIT
    // ===============================
    public function edit($id)
    {
        $adopsi = Adopsi::getById($id);
        $hewans = Hewan::all();
        return view('adopsi.edit', compact('adopsi', 'hewans'));
    }

    // ===============================
    // UPDATE DATA ADOPSI
    // ===============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_hewan' => 'required|exists:hewan,id',
            'nama_adopter' => 'required|string|max:255',
            'tanggal_adopsi' => 'required|date',
            'status' => 'required|string'
        ]);

        // Update data adopsi
        Adopsi::updateAdopsi($id, $request->all());

        return redirect()->route('adopsi.index')
                        ->with('success', 'Data adopsi berhasil diupdate.');
    }

    // ===============================
    // HAPUS DATA ADOPSI
    // ===============================
    public function destroy($id)
    {
        $adopsi = Adopsi::getById($id);
        
        // Kembalikan status hewan menjadi "Tersedia"
        $hewan = Hewan::findOrFail($adopsi->id_hewan);
        $hewan->update(['status' => 'Tersedia']);
        
        // Hapus data adopsi
        Adopsi::deleteAdopsi($id);

        return redirect()->route('adopsi.index')
                        ->with('success', 'Data adopsi berhasil dihapus.');
    }

    // ===============================
    // LAPORAN ADOPSI
    // ===============================
    public function laporan()
    {
        $laporan = Adopsi::getLaporan();
        return view('adopsi.laporan', compact('laporan'));
    }
}