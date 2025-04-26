<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/')->with('success', 'registrasi berhasil, silahkan login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth::attempt($credentials)){
            return redirect('task')->with('success', 'Welcome ' .  auth()->user()->name . '!');
        }

        return back()->withErrors(['email' => 'email atau password salah']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
