<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(app()->environment('local') || app()->environment('testing')){
            $reviews=[
                [
                    'id'=>'1',
                    'user_id'=>'3',
                    'shop_id'=>'1',
                    'score'=>'4',
                    'comment'=>'コースでいい値段ですが、お店の雰囲気はフォーマルな感じではなく品があっていい雰囲気です。予約して行きましたが、テーブルに感謝のメッセージが書かれてありました。',
                ],
                [
                    'id'=>'2',
                    'user_id'=>'4',
                    'shop_id'=>'1',
                    'score'=>'3',
                    'comment'=>'コースでいい値段。お店の雰囲気は品があっていい雰囲気。予約して行ったが、テーブルに感謝のメッセージが書かれてあった。',
                ],
                [
                    'id'=>'3',
                    'user_id'=>'5',
                    'shop_id'=>'1',
                    'score'=>'5',
                    'comment'=>'コースでいい値段ですが、お店の雰囲気はフォーマルな感じではなく品があっていい雰囲気です。食事もとても美味しく、新鮮な食材が余すことなく活かされていて素晴らしかったです。予約して行きましたが、テーブルに感謝のメッセージが書かれてありました。',
                ],
            ];
            DB::table('reviews')->insert($reviews);
        }
    }
}
