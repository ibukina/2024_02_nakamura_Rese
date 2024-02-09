<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'user_id'=>'3',
            'shop_id'=>'1',
            'date'=>'2021-04-01',
            'time'=>'17:00:00',
            'number'=>'1',
        ];
        DB::table('reservations')->insert($param);
    }
}
