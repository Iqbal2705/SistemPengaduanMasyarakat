<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Pengaduan;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }

    public function create()
    {
        // Tidak perlu mengambil data Category::all()
        return view('guest.pengaduan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'judul' => 'required',
            'isi_laporan' => 'required|min:10',
            'lokasi' => 'nullable'
        ]);

        $guest = Guest::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        $isiDenganLokasi = "LOKASI: " . ($request->lokasi ?? '-') . "\n" .
            "LAPORAN: " . $request->isi_laporan;
            
        $pengaduan = Pengaduan::create([
            'kode_pengaduan' => 'PGD-' . strtoupper(uniqid()),
            'guest_id' => $guest->id,
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'status' => 'pending',
        ]);

        session(['pengaduan_id' => $pengaduan->id]);

        return redirect('/cek');
    }

    public function cek()
    {
        if (!session()->has('pengaduan_id')) {
            return view('guest.cek', ['message' => 'Belum ada pengaduan.']);
        }

        $pengaduan = Pengaduan::find(session('pengaduan_id'));
        return view('guest.cek', compact('pengaduan'));
    }
}