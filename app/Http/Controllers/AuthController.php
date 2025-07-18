<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use App\Models\User;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (Session::has('pending_verification')) {
                $data = Session::pull('pending_verification');

                if ((int) $data['id'] === $user->id && ! $user->hasVerifiedEmail()) {
                    $user->markEmailAsVerified();
                    event(new Verified($user));
                    Session::flash('verified', true);
                }
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:100',
            'email'          => 'required|email|unique:users,email',
            'telepon'        => 'required|string|max:15|unique:users,telepon',
            'password'       => 'required|min:8|confirmed',
            'nim'            => 'nullable|string|max:20|unique:users,nim',
            'universitas_id' => 'nullable|exists:universitas,id',
        ]);

        $user = User::create([
            'nama'           => $request->nama,
            'email'          => $request->email,
            'telepon'        => $request->telepon,
            'nim'            => $request->nim,
            'universitas_id' => $request->universitas_id,
            'password'       => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
