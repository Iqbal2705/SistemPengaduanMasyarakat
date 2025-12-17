<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Balasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    // Tampilkan daftar pengaduan
    public function index(Request $request)
    {
        $query = Pengaduan::with(['user', 'category', 'staff.user'])
            ->orderBy('created_at', 'desc');

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_pengaduan', 'like', "%{$search}%")
                    ->orWhere('judul', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $pengaduan = $query->paginate(10);

        return view('staff.pengaduan.index', compact('pengaduan'));
    }

    // Detail pengaduan
    public function show($id)
    {
        $pengaduan = Pengaduan::with(['user', 'category', 'staff.user'])->findOrFail($id);

        return view('staff.pengaduan.show', compact('pengaduan'));
    }

    // Balas/Tanggapi pengaduan
    public function balas(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:proses,selesai,ditolak',
            'tanggapan' => 'required|string|min:10'
        ]);

        $staff = Auth::user()->staff;

        if (!$staff) {
            return back()->with('error', 'Anda tidak terdaftar sebagai staff');
        }

        // 1️⃣ SIMPAN KE TABEL PESAN (RIWAYAT BALASAN)
        Balasan::create([
            'pengaduan_id' => $pengaduan->id,
            'user_id' => Auth::id(),
            'pesan' => $validated['tanggapan']
        ]);

        // 2️⃣ UPDATE DATA PENGADUAN (STATUS TERKINI)
        $pengaduan->update([
            'status' => $validated['status'],
            'tanggapan' => $validated['tanggapan'],
            'staff_id' => $staff->id,
            'tanggal_tanggapan' => now()
        ]);

        return redirect()
            ->route('staff.pengaduan.show', $id)
            ->with('success', 'Tanggapan berhasil dikirim!');
    }
}