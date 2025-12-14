<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';


    protected $fillable = [
        'user_id',
        'jabatan',
        'kode_staff',
        'no_hp',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
