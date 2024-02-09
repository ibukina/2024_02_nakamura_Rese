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
        $users=[
            [
                'role_id'=>'1',
                'username'=>'admin',
                'email'=>'admin@example.com',
                'password'=>Hash::make('2DDywxxwE3VM@D4'),
            ],
            [
                'role_id'=>'2',
                'username'=>'manager',
                'email'=>'manager@example.com',
                'password'=>Hash::make('2DDywxxwE3VM@C3'),
            ],
            [
                'role_id'=>'3',
                'username'=>'test',
                'email'=>'test@example.com',
                'password'=>Hash::make('2DDywxxwE3VM@B2'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
