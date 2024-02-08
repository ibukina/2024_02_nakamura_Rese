<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function menu(){
        if(Auth::check()){
            return view('menu1');
        }
        return view('menu2');
    }

    public function create(){
        return view ('login');
    }

    public function store(LoginRequest $request){
        $credentials=$request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('/mypage');
        }
        return redirect('/login')->with('error', 'ログイン状態が正しくないか、会員登録されていない可能性があります');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/login');
    }
}
