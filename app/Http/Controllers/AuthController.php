<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{

    public function index(){
        return Inertia::render('login');
    }

    public function login(Request $request)
    {
        $formfields=$request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
          ]);


          if(auth()->attempt($formfields,$request->remember)){
              $request->session()->regenerate();
              return  redirect()->route('wp-admin.dashboard');

          }
          return  back()->withErrors(['email'=>'invalide credientials'])->onlyInput('email');

    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
