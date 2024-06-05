<?php

namespace App\Http\Controllers;

use App\Services\ShopImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\CsvFileRequest;
use App\Models\User;

class AdminController extends Controller
{
    protected $shopImportService;

    public function __construct(ShopImport $shopImportService){
        $this->shopImportService=$shopImportService;
    }

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
        $file = $request->file('csvFile');
        $filePath=$file->storeAs('csv', $file->getClientOriginalName());
        $errors=$this->shopImportService->importFromCsv(storage_path('app/' . $filePath));
        if(!empty($errors)){
            return redirect()->back()->withErrors($errors);
        }
        return redirect()->back()->with('message', 'CSVファイルのインポートに成功しました');
    }
}
