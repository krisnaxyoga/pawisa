<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AgendaKegiatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'agenda_kegiatan';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        "id_kategori",
        "gambar",
        "nama_produk",
        "deskripsi",
        "harga_jual",
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
