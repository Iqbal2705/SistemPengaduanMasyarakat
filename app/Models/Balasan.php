<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Balasan extends Model
{

    protected $table = 'pesan';

    protected $fillable = ['pengaduan_id','user_id','pesan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
