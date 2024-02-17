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
        $reservations=[
            [
                'id'=>'1',
                'user_id'=>'3',
                'shop_id'=>'1',
                'date'=>'2021-04-01',
                'time'=>'17:00:00',
                'number'=>'1',
            ],
            [
                'id'=>'2',
                'user_id'=>'3',
                'shop_id'=>'1',
                'date'=>'2022-04-01',
                'time'=>'17:00:00',
                'number'=>'1',
            ],
            [
                'id'=>'3',
                'user_id'=>'3',
                'shop_id'=>'1',
                'date'=>'2023-04-01',
                'time'=>'17:00:00',
                'number'=>'1',
            ],
            [
                'id'=>'4',
                'user_id'=>'3',
                'shop_id'=>'1',
                'date'=>'2023-07-01',
                'time'=>'17:00:00',
                'number'=>'1',
            ],
            [
                'id'=>'5',
                'user_id'=>'3',
                'shop_id'=>'1',
                'date'=>'2023-11-01',
                'time'=>'17:00:00',
                'number'=>'1',
            ],
            [
                'id'=>'6',
                'user_id'=>'3',
                'shop_id'=>'2',
                'date'=>'2023-09-05',
                'time'=>'17:00:00',
                'number'=>'1',
            ],
        ];
        DB::table('reservations')->insert($reservations);
    }
}
