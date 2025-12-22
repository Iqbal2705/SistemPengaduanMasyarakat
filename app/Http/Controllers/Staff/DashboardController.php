<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('staff.dashboard', [
            'totalPengaduan' => Pengaduan::count(),
            'pengaduanBaru' => Pengaduan::where('status', 'baru')->count(),
            'pengaduanProses' => Pengaduan::where('status', 'proses')->count(),
            'pengaduanSelesai' => Pengaduan::where('status', 'selesai')->count(),
        ]);
    }
}
