<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Adopsi extends Model
{
    use HasFactory;

    protected $table = 'adopsi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_hewan',
        'nama_adopter',
        'tanggal_adopsi',
        'status'
    ];

    /**
     * Relasi ke tabel Hewan
     */
    public function hewan()
    {
        return $this->belongsTo(Hewan::class, 'id_hewan');
    }

    /**
     * Ambil semua data adopsi (dengan join tabel hewan)
     */
    public static function getAll()
    {
        return self::with('hewan')
            ->orderBy('tanggal_adopsi', 'DESC')
            ->get();
    }

    /**
     * Ambil data adopsi berdasarkan ID
     */
    public static function getById($id)
    {
        return self::with('hewan')->findOrFail($id);
    }

    /**
     * Tambah data adopsi baru
     */
    public static function createAdopsi($data)
    {
        return self::create($data);
    }

    /**
     * Update data adopsi
     */
    public static function updateAdopsi($id, $data)
    {
        $adopsi = self::findOrFail($id);
        $adopsi->update($data);
        return $adopsi;
    }

    /**
     * Hapus data adopsi
     */
    public static function deleteAdopsi($id)
    {
        return self::destroy($id);
    }

    /**
     * Laporan jumlah adopsi per hewan
     */
    public static function getLaporan()
    {
        return DB::table('adopsi as a')
            ->join('hewan as h', 'a.id_hewan', '=', 'h.id')
            ->select(
                'h.nama_hewan',
                DB::raw('COUNT(a.id) as jumlah_adopsi'),
                DB::raw('MAX(a.tanggal_adopsi) as terakhir_adopsi')
            )
            ->groupBy('h.nama_hewan')
            ->get();
    }
}
