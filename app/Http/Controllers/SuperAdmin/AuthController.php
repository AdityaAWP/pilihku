<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        return view('super-admin.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $remember_me = $request->has('remember') ? true : false;

        if (Auth::guard('super-admin')->attempt($credentials, $remember_me)) {
            $request->session()->regenerate();

            return redirect()->route('super-admin.organizations.index');
        }

        Alert::error('Failed', 'Username / Password Salah');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::guard('super-admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('super-admin.auth');
    }
}
