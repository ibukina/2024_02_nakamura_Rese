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
        $reviews=[
            [
                'user_id'=>'3',
                'shop_id'=>'1',
                'score'=>'4',
                'comment'=>'コースでいい値段ですが、お店の雰囲気はフォーマルな感じではなく品があっていい雰囲気です。予約して行きましたが、テーブルに感謝のメッセージが書かれてありました。',
            ],
            [
                'user_id'=>'3',
                'shop_id'=>'2',
                'score'=>'4',
                'comment'=>'去年来た時よりグレードアップしていた。',
            ],
            [
                'user_id'=>'3',
                'shop_id'=>'3',
                'score'=>'5',
                'comment'=>'こんなに変わるものかと…最高の時間でした。',
            ],
            [
                'user_id'=>'3',
                'shop_id'=>'4',
                'score'=>'5',
                'comment'=>'変わらないおいしさ。これからもリピートさせて頂きます。',
            ],
            [
                'user_id'=>'3',
                'shop_id'=>'5',
                'score'=>'4',
                'comment'=>'美味しかった。',
            ],
        ];
        DB::table('reviews')->insert($reviews);
    }
}
