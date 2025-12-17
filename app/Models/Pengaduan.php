<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'kode_pengaduan',
        'user_id',
        'category_id',
        'judul',
        'isi_laporan',
        'foto',
        'lokasi',
        'status',
        'staff_id',
        'tanggapan',
        'tanggal_tanggapan'
    ];

    public function balasan()
    {
        return $this->hasMany(Balasan::class);
    }

    protected $casts = [
        'tanggal_tanggapan' => 'datetime'
    ];

    // Relasi ke User (pelapor)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke Staff (yang menangani)
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    // Badge warna status
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'warning',
            'proses' => 'info',
            'selesai' => 'success',
            'ditolak' => 'danger'
        ];

        return $badges[$this->status] ?? 'secondary';
    }

    // Label status
    public function getStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Menunggu',
            'proses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak'
        ];

        return $labels[$this->status] ?? 'Unknown';
    }
}