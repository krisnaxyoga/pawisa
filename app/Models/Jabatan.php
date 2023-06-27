<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    use HasFactory;

    public function pendaftaran() {
        return $this->hasMany(Pendaftaran::class);
    }
}
