<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\MessageBag;
use GuzzleHttp\Client;
use League\Csv\Reader;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Image;
use App\Http\Requests\ImportCsvRecordRequest;
use App\Http\Requests\CsvImageRequest;

class ShopImport
{
    protected $client;

    public function __construct(){
        $this->client=new Client([
            'allow_redirects' => [
                'max' => 10,  // 最大10回のリダイレクトを許可
                'strict' => true,  // RFC準拠のリダイレクトを使用
                'referer' => true,  // リダイレクト時にRefererヘッダーを追加
                'track_redirects' => true
            ]
        ]);
    }

    public function importFromCsv($filePath){
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);

        $errors=[];

        foreach ($csv as $index =>$record) {
            $validator=Validator::make($record, (new ImportCsvRecordRequest())->rules(), (new ImportCsvRecordRequest())->messages());
            if($validator->fails()){
                $errors[$index + 1]=$validator->errors()->all();
                continue;
            }

            $areaId = Area::where('area', $record['地域'])->first()->id;
            $genreId = Genre::where('genre', $record['ジャンル'])->first()->id;

            if(!$areaId || !$genreId){
                $errors[$index + 1][]='地域またはジャンルが存在しません';
                continue;
            }

            $imageUrl=$record['画像URL'];
            $imagePath=$this->downloadImage($imageUrl);
            if($imagePath instanceof MessageBag){
                // バリデーションエラーメッセージを$errors配列に追加
                $errors[$index + 1] = $imagePath->all();
                continue;
            }elseif(!$imagePath){
                $errors[$index + 1][] = '画像のダウンロードに失敗しました: ' . $imageUrl;
                continue;
            }

            $image=Image::create(['image'=>$imagePath]);
            $imageId=$image->id;

            $shop=Shop::create([
                'name'=>$record['店舗名'],
                'area_id'=>$areaId,
                'genre_id'=>$genreId,
                'summary'=>$record['店舗概要'],
                'image_id'=>$imageId,
            ]);
            if(!$shop){
                $errors[$index + 1][] = '店舗の追加に失敗しました';
            }
        }
        return $errors;
    }

    protected function downloadImage($url){
        try{
            $response=$this->client->get($url);
            $imageName=basename($url);
            $imagePath='public/image/' . $imageName;
            Storage::put($imagePath, $response->getBody()->getContents());
            // 画像ファイルの拡張子バリデーション
            $validator = Validator::make(['store_image' => $imageName], [
                'store_image' => ['regex:/\.(jpg|jpeg|png)$/i'],
            ], [
                'store_image.regex' => '画像ファイルはjpg,jpeg,pngの形式のもののみアップロード可能です',
            ]);
            if($validator->fails()){
                return $validator->errors();
            }
            return 'storage/image/' . $imageName;
        }catch(\Exception $e){
            return false;
        }
    }
}