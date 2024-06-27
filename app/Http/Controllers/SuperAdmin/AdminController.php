<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Organization;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::orderBy('name')->paginate(10);
        return view('super-admin.admins.index', compact('admins'));
    }

    public function create()
    {
        $organizations = Organization::orderBy('name')->get();

        return view('super-admin.admins.create', compact('organizations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins',
            'password' => 'required|min:8',
            'organization_id' => 'required|exists:organizations,id'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Admin::create($validatedData);

        alert()->success('Berhasil', 'Admin berhasil ditambahkan');
        return redirect()->route('super-admin.admins.index');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        $organizations = Organization::orderBy('name')->get();

        return view('super-admin.admins.edit', compact('admin', 'organizations'));
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:admins,username,'.$id,
            'password' => 'nullable|min:8',
            'organization_id' => 'required|exists:organizations,id'
        ];

        $admin = Admin::findOrFail($id);

        $validatedData = $request->validate($rules);

        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $admin->update($validatedData);

        alert()->success('Berhasil', 'Admin berhasil diubah');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        alert()->success('Berhasil', 'Admin berhasil dihapus');
        return redirect()->back();        
    }
}
