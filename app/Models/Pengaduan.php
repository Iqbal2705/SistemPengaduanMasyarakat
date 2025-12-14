<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan'; // ⬅ INI WAJIB

    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function balasan()
    {
        return $this->hasMany(Balasan::class);
    }
}
