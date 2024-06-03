<?php

namespace App\Imports;

use GuzzleHttp\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Image;

class ShopImport implements ToCollection, WithStartRow
{
    public static $startRow = 2; // CSVの1行目にヘッダがあるので、2行目からデータを取り込む

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // // 画像をストレージに保存し、そのパスを取得
            // $client = new Client([
            //     'allow_redirects' => [
            //         'max' => 10,  // 最大10回のリダイレクトを許可
            //         'strict' => true,  // RFC準拠のリダイレクトを使用
            //         'referer' => true,  // リダイレクト時にRefererヘッダーを追加
            //         'track_redirects' => true
            //     ]
            // ]);
            // $response = $client->get($row[4]);
            // $imageContent = $response->getBody()->getContents();

            // // ダウンロードした画像を一時ファイルに保存
            // $tempPath = tempnam(sys_get_temp_dir(), 'csvimport');
            // file_put_contents($tempPath, $imageContent);

            // // 一時ファイルをストレージに保存
            // $imagePath = Storage::putFile('images', new \Illuminate\Http\File($tempPath));

            // // 一時ファイルを削除
            // unlink($tempPath);

            // ローカルファイルシステム上の画像ファイルのパス
            $imagePath = $row[4];

            // ファイルの内容を取得
            $imageContent = file_get_contents($imagePath);


            // 画像をデータベースに保存し、そのIDを取得
            $image = Image::create(['path' => $imagePath]);
            $imageId = $image->id;

            // 地域とジャンルのIDを取得
            $areaId = Area::where('name', $row[1])->first()->id;
            $genreId = Genre::where('name', $row[2])->first()->id;

            // 店舗情報をデータベースに保存
            Shop::create([
                'name' => $row[0],
                'area_id' => $areaId,
                'genre_id' => $genreId,
                'summary' => $row[3],
                'image_id' => $imageId,
            ]);
        }
    }

    public function startRow(): int
    {
        return self::$startRow;
    }
}