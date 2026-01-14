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
        'isi',
        'status',
        'staff_id',
        'foto'
    ];

    /* ================= RELASI ================= */

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function balasan()
    {
        return $this->hasMany(Balasan::class);
    }

    /* ================= STATUS ================= */

    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'baru' => 'warning',
            'proses' => 'info',
            'selesai' => 'success',
            default => 'secondary',
        };
    }

    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'baru' => 'Menunggu',
            'proses' => 'Diproses',
            'selesai' => 'Selesai',
            default => 'Unknown',
        };
    }
}
