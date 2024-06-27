<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!auth()->user()) {
            if ($request->method() == 'GET') {
                return view('admin.auth.login');
            } else if ($request->method() == 'POST') {
                $data = $request->only('email', 'password');
                $remember = $request->filled('remember');
                if (Auth::attempt($data, $remember)) {
                    return redirect()->route('admin.dashboard');
                } else {
                    return back()->withErrors(['email' => 'E-mail və ya şifrəniz yalnışdır'])
                        ->withInput($request->only('email', 'remember'));
                }
            }
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}