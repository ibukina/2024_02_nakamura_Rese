# 2024_02_nakamura_Rese

## ページ一覧

#### 店舗一覧

?画像変える
![rese_shop_all](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/87337616-55d0-409c-b917-4d9b2192e550)

#### 店舗詳細・予約

?画像変える
![rese_shop_detail](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/5d61b1e9-42e8-4f01-8fa5-87735f13cfec)

#### 予約完了

![rese_done](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/9130f080-9fb8-406b-98cc-31eeade68ca6)

#### 新規登録

![rese_register](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/b2f5d922-25b7-4831-8a9e-fcb6ca70548e)

#### ユーザー登録完了

![rese_thanks](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/03369f2f-55f0-4068-8076-0c43be6e6c39)

#### ログイン

![rese_login](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/925fe093-8b9e-4036-b18b-b1e096c4a00f)

#### 未ログイン時メニュー

![rese_menu2](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/6322a2cd-8966-4d78-814d-aef930d5d2a2)

#### 済ログイン時メニュー

![rese_menu1](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/6846a5db-f9a9-4329-9a19-dcc7ef9a20d4)

#### マイページ

![rese_mypage](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/538a07fe-075e-4b50-a5a8-4ed99c6e81bf)

#### 予約内容変更

![rese_reservation_update](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/12c3ec08-4013-4014-a4c4-2d3d1b883225)

#### 店舗の口コミ投稿

?画像変える
![rese_review](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/b6bc3b27-f98e-4b5a-b21f-2b9eb9f26141)

#### 店舗の口コミ一覧

?画像追加する

#### 店舗管理

![rese_management](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/64759b17-5305-45b8-9dc9-fcf3cf584c33)

#### 店舗情報変更

![rese_detail_update](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/b286e596-38b1-42e3-ae8c-c53fc223fe8b)

#### 店舗代表者追加

![rese_admin](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/821d275a-326c-4fb4-930f-fa4b97f73ea4)

#### csv ファイルインポート

?画像追加

> [!IMPORTANT]
> このアプリは docker , VSCode の使用を前提としています。
> また開発環境は Windows ですので、MacOS 等他機種では動作が異なる可能性があります。ご了承ください。

## 作成した目的

外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持つことを考え、また競合他社のサービスは機能や画面が複雑で使いづらいため、差別化としてシンプルで使いやすいものを作成しました。

## アプリケーション URL

- ホーム画面(店舗一覧)
  http://localhost/
- 店舗詳細画面
  http://localhost/detail/{shop_id}
- メニュー画面
  http://localhost/menu
- 新規登録画面
  http://localhost/register
- 登録完了画面
  http://localhost/thanks
- ログイン画面
  http://localhost/login
  <br>
  ↑ これらは登録・ログインなしで見られます。<br>

- マイページ画面  
  http://localhost/mypage
- 予約完了画面  
  http://localhost/done
- 予約変更画面  
  http://localhost/reservation/{reservation_id}
- 口コミ投稿・編集画面  
  http://localhost/review/{detail_id}
  <br>
  ↑ これらは一般ユーザーのみアクセスできます。<br>

- 店舗管理画面  
  http://localhost/management
  <br>
  ↑ これは店舗代表者のみアクセスできます。  
  店舗情報変更時は店舗代表者としてログインした後店舗詳細画面にアクセスしてください。<br>

- 店舗代表者追加画面  
  http://localhost/admin
- csv ファイルインポート画面

  <br>
  ↑ これは管理者のみアクセスできます。<br>

新規登録・ログイン・ログアウト・ホームページ・マイページは、ホーム画面左上にあるアイコンを押していただくとメニュー画面から遷移できます。  
一般ユーザー以外でログインした場合、マイページ・お気に入り・予約・口コミ機能は利用できません。  
ログインに必要な情報は新規登録画面から追加するか、アカウントの種類の欄を利用してください。  
ユーザーのメール認証後の遷移先は初回のみホーム画面、それ以降はマイページとなっております。

> [!IMPORTANT]
> 新規登録する際はログイン後メール認証が行われますので、メールサーバーの設定をお願いします。

## 機能一覧

- 会員登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報変更
- 飲食店予約情報削除
- エリアで検索する
- ジャンルで検索する
- 店名で検索する
- 店舗のソート機能
- ユーザーのみ口コミの投稿・編集機能
- ユーザーと管理者のみ口コミの削除機能
- 店舗代表者による店舗情報の作成
- 店舗代表者による店舗情報の更新
- ユーザー予約情報の確認
- 管理者による店舗代表者の作成
- 管理者のみ csv ファイルインポートによる店舗の作成

## 使用技術(実行環境)

> laravel Framework 9.52.16<br>
> php 8.0.6<br>
> mysql 8.0.26<br>
> nginx 1.22.0<br>

## テーブル設計

- rolesTable
  ![rese_table_roles](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/53f8ff51-0369-458b-85e2-4723525714cc)

- usersTable
  ![rese_table_users](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/5140245d-92e7-4891-a690-8cc1d4c05b16)

- imagesTable
  ![rese_table_images](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/70a40799-7598-4fcb-b3cc-e4fccbe34766)

- areasTable
  ![rese_table_areas](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/d156c97b-f478-47bb-b9f0-2528b04a2583)

- genresTable
  ![rese_table_genres](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/9a070389-a18f-477b-9ce4-778a99444486)

- shopsTable
  ![rese_table_shops](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/57e74f28-295b-40a0-ae4a-27a0550a0ef4)

- favoritesTable
  ![rese_table_favorites](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/e58558c3-3c01-48b3-a249-0c8ba684d240)

- reservationsTable
  ![rese_table_reservations](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/52310a7b-0c99-46ad-bafc-799b5e1e0ce0)

- reviewsTable
  ![rese_table_reviews](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/a669036e-567f-4d3b-b4e2-c4c9c6377a40)

## ER 図

![rese drawio](https://github.com/ibukina/2024_02_nakamura_Rese/assets/142294463/caabff57-6d4e-4224-9141-db0e901b976d)

## 環境構築

> [!IMPORTANT]
> これは Windows での構築方法です。
> 他 OS の場合は異なる場合がございます。<br>

- プロジェクトのクローン<br>
  まず、コマンドライン上でアプリケーションを導入したいディレクトリまで移動してください。
  移動出来たら、

```コマンドライン
git clone <リポジトリのurl>
```

を実行してください。<br>
これでプロジェクトのクローンが出来ました。<br>

- docker の作成と起動<br>
  次に、クローンしたプロジェクトのあるディレクトリで、

```コマンドライン
docker-compose up -d --build
```

を実行してください。<br>
これで、docker コンテナの作成と起動が完了しました。<br>  
docker が起動しているか目に見える形で確認したい方は、docker desktop を導入して確認してみてください。<br>

- laravel の導入<br>
  プロジェクトのディレクトリで、

```コマンドライン
docker-compose exec php bash
```

を実行して、php コンテナにログインしてください。<br>
ログインが出来たら

```phpコンテナ
composer install
```

を実行してください。<br>
これで laravel はインストール出来ました。<br>

- .env ファイルと APP_KEY の作成<br>
  laravel の導入時のように、php コンテナにログインしてください。<br>
  php コンテナ内で

```phpコンテナ
cp .env.example .env
```

を実行して、.env ファイルを作成してください。<br>
作成出来たら、

```phpコンテナ
exit
```

で php コンテナからログアウトした後、

```コマンドライン
code .
```

を実行して、VSCode でプロジェクトを開きます。<br>
src 以下に.env ファイルがあるので、そちらの 11 から 16 行目を

```.env:.envファイル
DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
+ DB_HOST=mysql
DB_PORT=3306
- DB_DATABASE=laravel
- DB_USERNAME=root
- DB_PASSWORD=
+ DB_DATABASE=laravel_db
+ DB_USERNAME=laravel_user
+ DB_PASSWORD=laravel_pass
```

のように変更し、保存してください。 <br>
php コンテナにログインして、

```phpコンテナ
php artisan key:generate
```

を実行して、APP_KEY を作成してください。<br>
データベースが存在するか確認したい場合は、
http://localhost:8080/
にアクセスしてください。<br>

- データベースとテーブルの作成<br>
  プロジェクトディレクトリで

```コマンドライン
docker-compose exec mysql bash
```

を実行して、mysql コンテナに入ってください。<br>
コンテナに入れたら

```mysqlコンテナ
mysql -u laravel_user -p
```

で、コンテナにログインしてください。<br>
この時、パスワードを求められるので、.env ファイルで変更した DB_PASSWORD の`laravel_pass`を入力してください。<br>
ログイン出来たら

```mysqlコンテナ
USE laravel_db;
```

を実行して、laravel_db を使用するようにしてください。<br>
確認のため

```mysqlコンテナ
SELECT DATABASE();
```

を実行して、laravel_db が選択されていることを確認してください。<br>
確認出来たら、

```
exit
```

で mysql コンテナからログアウトして、プロジェクトディレクトリに戻ってください。<br>
最後に、laravel の導入時のように php コンテナにログインして

```phpコンテナ
php artisan migrate
```

を実行して、マイグレーションテーブルを作成してください。<br>
php コンテナからのログアウトには`exit`を実行してください。<br>

- ストレージのシンボリックリンク作成<br>
  このアプリケーションでは画像を storage/app/public/image 以下に保存するため、シンボリックリンクと保存先の image ディレクトリを作成します。

```phpコンテナ
chmod -R 775 storage
```

```phpコンテナ
chmod -R 775 public/storage
```

```phpコンテナ
php artisan storage:link
```

```phpコンテナ
mkdir -p storage/app/public/image
```

これらを順に行ってください。

- データの作成
  デフォルトの情報を作成するため、シーディングを行います。

```phpコンテナ
php artisan db:seed
```

これでデータが作成されました。

- メールサーバーの設定<br>
  .env ファイルと APP_KEY の作成で変更した.env ファイルを変更します。
  .env ファイルの 32 から 39 行目を、ご利用されるメールサーバーの情報に変更してください。

```.env:.envファイル
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

- node_modules のインストール
  このアプリケーションでは jquery・vite 等を利用していますので、src ディレクトリに移動して、
  ```srcディレクトリ
  npm install
  ```
  を行ってください。

これで環境構築は終了です。お疲れ様でした。

## アカウント等ダミーデータの種類

動作確認用のユーザー情報です。<br>
環境構築後、laravel を導入した php コンテナにて

```phpコンテナ
php artisan db:seed
```

を行って頂くと、下記のユーザーが作成されます。

> テストユーザー
> username:test  
> email:test@example.com  
> password:2DDywxxwE3VM@B2

> 店舗代表者
> username:manager  
> email:manager@example.com  
> password:2DDywxxwE3VM@C3

> 管理者
> username:admin  
> email:admin@example.com  
> password:2DDywxxwE3VM@D4

`php artisan db:seed`で作成した情報は、`php artisan migrate:fresh`で一括削除できます。

## csv ファイルの書き方について
