<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'username'=>'test',
            'email'=>'test@example.com',
            'password'=>Hash::make('2DDywxxwE3VM@B2'),
        ];
        DB::table('users')->insert($param);
    }
}
