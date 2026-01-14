<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balasan extends Model
{
    protected $table = 'balasan'; // 🔥 WAJIB

    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'pesan'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
