<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUser' => User::count(),
            'totalPengaduan' => Pengaduan::count(),
            'pengaduanSelesai' => Pengaduan::where('status', 'selesai')->count(),
        ]);
    }
}
