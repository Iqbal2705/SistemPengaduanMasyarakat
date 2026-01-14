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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $guest = Guest::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        // Upload foto
        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('pengaduan', 'public');
        }

        $pengaduan = Pengaduan::create([
            'kode_pengaduan' => 'PGD-' . strtoupper(uniqid()),
            'guest_id' => $guest->id,
            'judul' => $request->judul,
            'isi' => $request->isi_laporan,
            'foto' => $foto,
            'status' => 'baru', // 🔥 PENTING
        ]);

        session(['pengaduan_id' => $pengaduan->id]);

        return redirect('/cek');
    }


    public function cek()
    {
        if (!session()->has('pengaduan_id')) {
            return view('guest.cek', ['message' => 'Belum ada pengaduan.']);
        }

        $pengaduan = Pengaduan::with('balasan.user')
            ->find(session('pengaduan_id'));

        return view('guest.cek', compact('pengaduan'));
    }

}