<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas=[
            [
                'id'=>'1',
                'area'=>'東京都'
            ],
            [
                'id'=>'2',
                'area'=>'大阪府',
            ],
            [
                'id'=>'3',
                'area'=>'福岡県',
            ],
        ];
        DB::table('areas')->insert($areas);
    }
}
