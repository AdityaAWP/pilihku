<?php

namespace App\Http\Controllers\Admin;

use App\Models\Organization;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function edit(Request $request)
    {
        $organization = $request->organization;

        return view('admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request)
    {
        $rules = [
            'logo' => 'nullable|image|file|max:10240',
            'bio' => 'nullable'
        ];

        $organization = Organization::findOrFail($request->organization->id);

        $validatedData = $request->validate($rules);

        if ($request->file('logo')) {
            if (Storage::disk('public')->exists('logo/'.$organization->logo)) {
                Storage::disk('public')->delete('logo/'.$organization->logo);
            }

            $fileName = time() . '_' . $request->logo->getClientOriginalName();
            $request->logo->storeAs('logo', $fileName, 'public');

            $validatedData['logo'] = $fileName;
        }

        $organization->update($validatedData);

        alert()->success('Berhasil', 'Berhasil mengubah informasi organisasi');
        return redirect()->back();
    }
}
