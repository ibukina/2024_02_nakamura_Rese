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
        DB::table('users')->insert([
            'id'=>'1',
            'role_id'=>'1',
            'username'=>'admin',
            'email'=>'admin@example.com',
            'email_verified_at'=>'2021-01-01 12:00:00',
            'password'=>Hash::make('2DDywxxwE3VM@D4'),
        ]);

        if(app()->environment('local') || app()->environment('testing')){
            $users=[
                [
                    'id'=>'2',
                    'role_id'=>'2',
                    'username'=>'manager',
                    'email'=>'manager@example.com',
                    'email_verified_at'=>'2021-01-02 12:00:00',
                    'password'=>Hash::make('2DDywxxwE3VM@C3'),
                ],
                [
                    'id'=>'3',
                    'role_id'=>'3',
                    'username'=>'test',
                    'email'=>'test@example.com',
                    'email_verified_at'=>'2022-01-01 12:00:00',
                    'password'=>Hash::make('2DDywxxwE3VM@B2'),
                ],
                [
                    'id'=>'4',
                    'role_id'=>'3',
                    'username'=>'test',
                    'email'=>'test2@example.com',
                    'email_verified_at'=>'2022-01-01 12:00:00',
                    'password'=>Hash::make('2DDywxxwE3VM@B4'),
                ],
                [
                    'id'=>'5',
                    'role_id'=>'3',
                    'username'=>'test',
                    'email'=>'test3@example.com',
                    'email_verified_at'=>'2022-01-01 12:00:00',
                    'password'=>Hash::make('2DDywxxwE3VM@B6'),
                ],
            ];
            DB::table('users')->insert($users);
        }
    }
}
