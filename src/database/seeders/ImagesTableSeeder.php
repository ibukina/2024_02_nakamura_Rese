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
                'image'=>'storage/image/sushi.jpg',
            ],
            [
                'id'=>'2',
                'image'=>'storage/image/yakiniku.jpg',
            ],
            [
                'id'=>'3',
                'image'=>'storage/image/ramen.jpg',
            ],
            [
                'id'=>'4',
                'image'=>'storage/image/izakaya.jpg',
            ],
            [
                'id'=>'5',
                'image'=>'storage/image/italian.jpg',
            ],
        ];
        DB::table('images')->insert($images);
    }
}
