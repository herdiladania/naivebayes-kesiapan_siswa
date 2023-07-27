<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        if (Auth::user()){
            return redirect()->intended('beranda');
        }

        return view('login',
        [
            "title" => "Login"
        ]);
    }


    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password'=> 'required|string'
        ],
        [
            'name.required' => 'Nama/email masih kosong',
            'password.required' => 'password masih kosong',
        ]);

        $kredentials = $request -> only('name','password');
        if(Auth::attempt($kredentials)){
            $request->session()->regenerate();
            $user = Auth::user();

            if($user){
                return redirect()->intended('beranda');
            }
            return view('login',[
                "title" => "Login"
            ]);

        }
        return back()->withErrors([
            'name' => 'Maaf, Akun tidak terdaftar'
        ])->onlyInput('name');
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
