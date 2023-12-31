<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    use HasFactory;

    public function pendaftaran() {
        return $this->hasMany(Pendaftaran::class);
    }
}
