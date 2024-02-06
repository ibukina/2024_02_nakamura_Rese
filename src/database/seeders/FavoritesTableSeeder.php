<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $favorites=[
            [
                'user_id'=>'1',
                'shop_id'=>'1',
            ],
            [
                'user_id'=>'1',
                'shop_id'=>'2',
            ],
        ];
        DB::table('favorites')->insert($favorites);
    }
}
