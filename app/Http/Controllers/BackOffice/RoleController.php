<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('back-office.user-data.role.index', compact('roles'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ], [
            'role.required' => 'Role harus diisi',
        ]);

        $role = new Role;
        $role->role = $request->role;
        $role->save();

        return redirect()->back()->with('success', 'Peran baru ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
        ], [
            'role.required' => 'Role harus diisi',
        ]);

        $role = Role::find($id);
        $role->role = $request->role;
        $role->save();

        return redirect()->back()->with('success', 'Peran telah diubah');
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->user()->delete();
        $role->delete();
        return redirect()->back()->with('success', 'Peran telah dihapus');
    }

}
