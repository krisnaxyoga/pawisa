<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    use HasFactory;

    public function anggota() {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
    
    public function jabatan() {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
