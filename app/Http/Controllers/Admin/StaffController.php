<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::with('user')->paginate(10);
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:15',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'jabatan.required' => 'Jabatan wajib diisi',
        ]);

        // Buat user dulu
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'staff'
        ]);

        // Generate kode staff otomatis
        $kodeStaff = 'STF' . str_pad($user->id, 4, '0', STR_PAD_LEFT);

        // Buat data staff
        Staff::create([
            'user_id' => $user->id,
            'kode_staff' => $kodeStaff,
            'jabatan' => $validated['jabatan'],
            'no_hp' => $validated['no_hp'] ?? null,
            'status' => 'aktif'
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Staff berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $staff = Staff::with('user')->findOrFail($id);
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        // Validasi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $staff->user_id,
            'password' => 'nullable|min:6|confirmed',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Update user
        $staff->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // Update password jika diisi
        if (!empty($validated['password'])) {
            $staff->user->update([
                'password' => Hash::make($validated['password'])
            ]);
        }

        // Update staff
        $staff->update([
            'jabatan' => $validated['jabatan'],
            'no_hp' => $validated['no_hp'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Staff berhasil diupdate!');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        
        // Hapus user (staff akan otomatis terhapus karena cascade)
        $staff->user->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff berhasil dihapus!');
    }
}