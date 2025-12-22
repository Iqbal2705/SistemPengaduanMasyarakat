<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    // LIST DATA
    public function index()
    {
        $guests = Guest::latest()->paginate(10);
        return view('admin.guest.index', compact('guests'));
    }

    // DETAIL
    public function show($id)
    {
        $guest = Guest::with('pengaduan')->findOrFail($id);
        return view('admin.guest.show', compact('guest'));
    }

    // FORM EDIT
    public function edit($id)
    {
        $guest = Guest::findOrFail($id);
        return view('admin.guest.edit', compact('guest'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required'
        ]);

        $guest = Guest::findOrFail($id);
        $guest->update($request->all());

        return redirect()
            ->route('admin.guest.index')
            ->with('success', 'Data guest berhasil diperbarui');
    }

    // HAPUS
    public function destroy($id)
    {
        Guest::findOrFail($id)->delete();

        return back()->with('success', 'Data guest berhasil dihapus');
    }
}
