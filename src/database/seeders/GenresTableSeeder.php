<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres=[
            [
                'id'=>'1',
                'genre'=>'寿司',
            ],
            [
                'id'=>'2',
                'genre'=>'焼肉',
            ],
            [
                'id'=>'3',
                'genre'=>'ラーメン',
            ],
            [
                'id'=>'4',
                'genre'=>'居酒屋',
            ],
            [
                'id'=>'5',
                'genre'=>'イタリアン',
            ],
        ];
        DB::table('genres')->insert($genres);
    }
}
