<?php

namespace App\Http\Controllers;

use Exception\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ShopImport;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\CsvFileRequest;
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

    public function csvCreate(CsvFileRequest $request){
        if ($request->hasFile('csvFile')) {
            $file = $request->file('csvFile');
            Excel::import(new ShopImport, $file);
        } else {
            throw new Exception('CSVファイルの取得に失敗しました。');
        }
        return redirect()->back()->with('message', '店舗が追加されました');
    }
}
