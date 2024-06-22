<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::orderBy('name')->paginate(10);
        return view('super-admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('super-admin.organizations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:organizations',
            'logo' => 'image|file|max:10240',
            'bio' => 'nullable'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        if ($request->file('logo')) {
            $fileName = time() . '_' . $request->logo->getClientOriginalName();
            $request->logo->storeAs('logo', $fileName, 'public');

            $validatedData['logo'] = $fileName;
        }

        Organization::create($validatedData);

        alert()->success('Berhasil', 'Organisasi berhasil ditambahkan');
        return redirect()->route('super-admin.organizations.index');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $organization = Organization::findOrFail($id);

        return view('super-admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|unique:organizations,name,'.$id,
            'logo' => 'image|file|max:10240',
            'bio' => 'nullable'
        ];

        $organization = Organization::findOrFail($id);

        $validatedData = $request->validate($rules);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        if ($request->file('logo')) {
            if (Storage::disk('public')->exists('logo/'.$organization->logo)) {
                Storage::disk('public')->delete('logo/'.$organization->logo);
            }

            $fileName = time() . '_' . $request->logo->getClientOriginalName();
            $request->logo->storeAs('logo', $fileName, 'public');

            $validatedData['logo'] = $fileName;
        }

        $organization->update($validatedData);

        alert()->success('Berhasil', 'Organisasi berhasil diubah');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $organization = Organization::findOrFail($id);

        if (Storage::disk('public')->exists('logo/'.$organization->logo)) {
            Storage::disk('public')->delete('logo/'.$organization->logo);
        }

        $organization->delete();

        alert()->success('Berhasil', 'Organisasi berhasil dihapus');
        return redirect()->back();        
    }
}
