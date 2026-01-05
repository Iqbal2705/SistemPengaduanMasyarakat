<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Pengaduan;
use App\Models\Category;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('guest.pengaduan', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'category_id' => 'required|exists:categories,id', // Tambahkan validasi kategori
            'judul' => 'required',
            'isi_laporan' => 'required|min:10'
        ]);

        $guest = Guest::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        $pengaduan = Pengaduan::create([
            'kode_pengaduan' => 'PGD-' . strtoupper(uniqid()),
            'guest_id'       => $guest->id,
            'category_id'    => $request->category_id, // Tambahkan ini agar tidak error foreign key
            'judul'          => $request->judul,
            'isi_laporan'    => $request->isi_laporan, // PERBAIKAN: Dari 'isi' menjadi 'isi_laporan'
            'status'         => 'pending'              // PERBAIKAN: Dari 'baru' menjadi 'pending'
        ]);

        // 🔥 SIMPAN KE SESSION
        session(['pengaduan_id' => $pengaduan->id]);

        return redirect('/cek');
    }

    public function cek()
    {
        if (!session()->has('pengaduan_id')) {
            return view('guest.cek', [
                'message' => 'Belum ada pengaduan yang dikirim.'
            ]);
        }

        $pengaduan = Pengaduan::with(['balasan.user'])
            ->find(session('pengaduan_id'));

        return view('guest.cek', compact('pengaduan'));
    }
}