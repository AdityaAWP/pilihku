<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('organization_id', $request->organization->id)
            ->orderBy('name')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins',
            'password' => 'required|min:8',
            'profile_photo' => 'image|file|max:10240',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['organization_id'] = $request->organization->id;

        if ($request->file('profile_photo')) {
            $fileName = time() . '_' . $request->profile_photo->getClientOriginalName();
            $request->profile_photo->storeAs('profile_photo', $fileName, 'public');

            $validatedData['profile_photo'] = $fileName;
        }

        User::create($validatedData);

        alert()->success('Berhasil', 'Anggota berhasil ditambahkan');
        return redirect()->route('admin.users.index', $request->organization->slug);
    }

    public function edit(string $_, string $id, Request $request)
    {
        $user = User::where('organization_id', $request->organization->id)->findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(string $_, string $id, Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:admins,username,' . $id,
            'password' => 'nullable|min:8',
            'profile_photo' => 'image|file|max:10240',
        ];

        $user = User::where('organization_id', $request->organization->id)->findOrFail($id);

        $validatedData = $request->validate($rules);

        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        if ($request->file('profile_photo')) {
            if (Storage::disk('public')->exists('profile_photo/' . $user->profile_photo)) {
                Storage::disk('public')->delete('profile_photo/' . $user->profile_photo);
            }

            $fileName = time() . '_' . $request->profile_photo->getClientOriginalName();
            $request->profile_photo->storeAs('profile_photo', $fileName, 'public');

            $validatedData['profile_photo'] = $fileName;
        }

        $user->update($validatedData);

        alert()->success('Berhasil', 'Anggota berhasil diubah');
        return redirect()->back();
    }

    public function destroy(string $_, string $id, Request $request)
    {
        $user = User::where('organization_id', $request->organization->id)->findOrFail($id);

        $user->delete();

        alert()->success('Berhasil', 'Anggota berhasil dihapus');
        return redirect()->back();
    }

    public function faceRecognition(string $_, string $id, Request $request)
    {
        $user = User::where('organization_id', $request->organization->id)->findOrFail($id);

        return view('admin.users.face', compact('user'));
    }

    public function ajaxPhoto(Request $request)
    {
        $user = User::where('username', $request['path'])->firstOrFail();
        if (isset($user->face_recognition_photo)) {
            if (Storage::disk('public')->exists('face_recognition_photo/'.$user->face_recognition_photo)) {
                Storage::disk('public')->delete('face_recognition_photo/'.$user->face_recognition_photo);
            }                
        }

        $image = $request["image"];

        $image_parts = explode(";base64,", $image);
    
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $request["path"] . '.png';
    
        Storage::put('face_recognition_photo/'.$fileName, $image_base64);

        $user->update(["face_recognition_photo" => $fileName]);
        return $user;
    }

    public function ajaxDescrip(Request $request)
    {
        $json = file_get_contents('neural.json');
        if(strlen($json) > 4){
            $string = ',' . $request["myData"]; 
        }
        else{
            $string = $request["myData"];
        }
        $position = strlen($json) - 2; 
        $out = substr_replace( $json, $string, $position, 0 ); 
        file_put_contents('neural.json', $out);
    }
}
