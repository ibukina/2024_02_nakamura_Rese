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
                'reservation_id'=>'2',
                'score'=>'3',
                'comment'=>'可もなく不可もなくという感じ。',
            ],
            [
                'user_id'=>'3',
                'shop_id'=>'1',
                'reservation_id'=>'3',
                'score'=>'4',
                'comment'=>'去年来た時よりグレードアップしていた。',
            ],
            [
                'user_id'=>'3',
                'shop_id'=>'1',
                'reservation_id'=>'4',
                'score'=>'5',
                'comment'=>'数年でこんなに変わるものかと…最高の時間でした。',
            ],
            [
                'user_id'=>'3',
                'shop_id'=>'1',
                'reservation_id'=>'5',
                'score'=>'5',
                'comment'=>'変わらないおいしさ。これからもリピートさせて頂きます。',
            ],
            [
                'user_id'=>'3',
                'shop_id'=>'2',
                'reservation_id'=>'6',
                'score'=>'4',
                'comment'=>'肉は美味しかった。',
            ],
        ];
        DB::table('reviews')->insert($reviews);
    }
}
