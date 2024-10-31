<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'layanan';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_pemohon',
        'jenis_layanan',
        'tanggal_ajuan',
        'status',
    ];

    // Menetapkan tipe enum untuk kolom status dan jenis layanan
    protected $casts = [
        'jenis_layanan' => 'string',
        'status' => 'string',
    ];
}
