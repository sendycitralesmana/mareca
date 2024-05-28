<?php

namespace App\Http\Controllers;

use App\Mail\Auth\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'email.email' => 'Email tidak valid',
        ]);

        // check if email no registered
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Email tidak terdaftar');
        }

        // check if password not match
        if (!password_verify($request->password, $user->password)) {
            return back()->with('error', 'Password tidak sesuai');
        }

        // check if email not verified
        if (!$user->email_verified_at) {
            return back()->with('error', 'Email belum diverifikasi, silahkan cek email anda');
        }

        // login success
        $request->session()->regenerate();
        Auth::login($user);
        return redirect()->intended('/back-office/dashboard');

    }

    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            // $user->remember_token = null;
            $user->email_verified_at = now();
            $user->save();
            return redirect('/login')->with('success', 'Akun anda telah diverifikasi. Silahkan masuk');
        } else {
            abort(404);
        }
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPasswordAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Email tidak terdaftar');
        }

        $user->remember_token = Str::random(40);
        $user->save();

        Mail::to($user->email)->send(new ForgotPasswordMail($user));

        return redirect()->back()->with('success', 'Silahkan cek email anda untuk mengatur ulang password');
    }

    public function resetPassword($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            return view('auth.reset-password', compact('user', 'token'));
        } else {
            abort(404);
        }
    }

    public function resetPasswordAction(Request $request, $token)
    {
        $request->validate([
           'password' => 'required|min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
           'password_confirmation' => 'required|same:password',
        ], [
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.regex' => 'Password harus terdiri dari huruf kecil, huruf besar, dan angka',
            'password_confirmation.required' => 'Konfirmasi password harus diisi',
            'password_confirmation.same' => 'Konfirmasi password tidak sesuai',
        ]);

        $user = User::where('remember_token', $token)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->update();
            // return redirect()->back();
            return redirect('/login')->with('success', 'Password anda telah di atur ulang. Silahkan masuk');
        } else {
            abort(404);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
