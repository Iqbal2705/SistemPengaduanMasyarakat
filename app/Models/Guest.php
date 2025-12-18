<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'alamat'
    ];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
