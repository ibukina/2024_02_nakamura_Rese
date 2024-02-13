<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images=[
            [
                'id'=>'1',
                'image'=>'img/sushi.jpg',
            ],
            [
                'id'=>'2',
                'image'=>'img/yakiniku.jpg',
            ],
            [
                'id'=>'3',
                'image'=>'img/ramen.jpg',
            ],
            [
                'id'=>'4',
                'image'=>'img/izakaya.jpg',
            ],
            [
                'id'=>'5',
                'image'=>'img/italian.jpg',
            ],
        ];
        DB::table('images')->insert($images);
    }
}
