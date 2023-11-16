<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller {
    public function index() {
        return view('login');
    }
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth()->user()->role == 'user') {
                return redirect(route('home'));
            }
            return redirect(route('admin.index'));
        }
        Alert::error('Error', 'User not found');
        return redirect()->back();
    }
    public function register() {
        return view('register');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);
        Alert::success('Success', 'You have been register');
        return redirect(route('login'));
    }
    public function logout(Request $request) {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
