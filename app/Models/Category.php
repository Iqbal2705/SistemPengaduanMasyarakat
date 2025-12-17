<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'icon'
    ];

    // Relasi ke Pengaduan
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}