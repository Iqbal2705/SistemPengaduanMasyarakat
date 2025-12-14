<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::with('user')->get();
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'role' => 'staff'
        ]);

        Staff::create([
            'user_id' => $user->id,
            'jabatan' => $request->jabatan
        ]);

        return redirect()->route('staff.index');
    }

    public function edit($id)
    {
        $staff = Staff::with('user')->findOrFail($id);
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->update($request->only('jabatan', 'no_hp', 'status'));
        $staff->user->update($request->only('name', 'email'));

        return redirect('/admin/staff');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->user->delete();
        return back();
    }
}
