<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
     use HasFactory;
    protected $table = 'hewan';
    protected $fillable = ['nama_hewan', 'id_kategori', 'deskripsi'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

}
