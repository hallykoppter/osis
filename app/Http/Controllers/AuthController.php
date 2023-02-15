<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('home', ['title' => 'OSIS | Login']);
    }

    public function authentication(Request $request)
    {
        $credentiials = $request->validate(
            [
                'NISN' => 'required',
                'password' => 'required'
            ]
        );

        if (Auth::guard('user')->attempt($credentiials)) {
            $request->session()->regenerate();
            if (Auth::guard('user')->user()->sudah_memilih !== 0) {
                return redirect('done');
            } else {
                return redirect()->intended('/main');
            }
        }
        return back()->with('LoginError', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logout_admin(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login_admin(Request $request)
    {
        $credentiials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt($credentiials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('LoginError', 'Login Gagal');
    }
}
