<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            [
                'id'=>'1',
                'name'=>'admin',
            ],
            [
                'id'=>'2',
                'name'=>'manager',
            ],
            [
                'id'=>'3',
                'name'=>'user',
            ],
        ];
        DB::table('roles')->insert($roles);
    }
}
