<?php
namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Balasan;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::with('user')->latest()->get();
        return view('staff.pengaduan.index', compact('pengaduan'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with('user','balasan.user')->findOrFail($id);
        return view('staff.pengaduan.show', compact('pengaduan'));
    }

    public function balas(Request $request, $id)
    {
        Balasan::create([
            'pengaduan_id' => $id,
            'user_id' => auth()->id(),
            'pesan' => $request->pesan
        ]);

        return back();
    }
}
