<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Register view page
    public function register()
    {
        return view('auth.register');
    }
    // register new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->assignRole($request->input('role'));
        return redirect()->route('books.index')->with('success', 'User created successfully!');
    }
    // Login view page
    public function login()
    {
        return view('auth.login');
    }
    // authenticate user after input login data
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            return redirect()->route('books.index')->withSuccess('Signed in');
        }

        return redirect()->route('auth.login')->with('success', 'Login details are not valid');
    }
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('auth.login');
    }
}
