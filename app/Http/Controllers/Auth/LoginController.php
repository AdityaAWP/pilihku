<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if the user exists in the database
        $userExists = \App\Models\User::where('username', $request->username)->exists();

        // Attempt to log the user in
        $credentials = $request->only('username', 'password');

        if ($userExists && Auth::attempt($credentials)) {
            // If successful, redirect to the intended location
            return redirect()->intended('voting');
        }

        // If the user does not exist
        if (!$userExists) {
            $error = ['username' => 'Username tidak terdaftar'];
        } else {
            // If unsuccessful, incorrect password
            $error = ['password' => 'Password yang anda masukkan salah'];
        }

        // Redirect back with input and an error message
        return redirect()->back()->withInput($request->only('username', 'remember'))
                                 ->withErrors($error);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
