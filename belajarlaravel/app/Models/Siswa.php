<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nis',
        'siswa_nama',
        'username',
        'password',
        'siswa_alamat',
        'siswa_hp',
        'kelas_kode',
        
    ];
}
