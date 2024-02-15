<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AdminController extends Controller
{
    public function create(){
        return view('admin');
    }

    public function store(RegisterRequest $request){
        User::create([
            'role_id'=>$request['role_id'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/admin')->with('message', '店舗管理者が追加されました');
    }
}
