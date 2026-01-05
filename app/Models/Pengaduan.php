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
        'guest_id',
        'judul',
        'isi_laporan',
        'status'
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
        return $this->belongsTo(Category::class, 'category_id');
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
            'baru' => 'warning',
            'proses' => 'info',
            'selesai' => 'success'
        ];

        return $badges[$this->status] ?? 'secondary';
    }

    // Label status
    public function getStatusLabelAttribute()
    {
        $labels = [
            'baru' => 'Menunggu',
            'proses' => 'Diproses',
            'selesai' => 'Selesai'
        ];

        return $labels[$this->status] ?? 'Unknown';
    }
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

}