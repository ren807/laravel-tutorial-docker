# laravel-tutorial-docker

## 初回

1. laravel-tutorial-dockerリポジトリをClone
2. ``cd docker``で/dockerディレクトリに移動
3. mailpitリポジトリをClone ( https://github.com/axllent/mailpit )
4. ``cd ../``で/ディレクトリに移動
5. ``docker-compose build``でイメージを作成
6. ``docker-compose up -d``でコンテナを作成・起動
7. ``docker-compose exec app bash``でappコンテナに入る
8. ``npm install``でパッケージをインストール
9. ``comopser install``でパッケージをインストール
10. /laravel-projectディレクトリに.envファイルを作成 ( .env.exampleファイルをコピー )
11. ``chown www-data storage/ -R``でstorage配下の所有者を変更
12. ``php artisan key:generate``でAPP_KEYを生成
13. ``npm run dev``

## 2回目以降

1. ``docker-compose up -d``でコンテナを起動
2. ``docker-compose exec app bash``でappコンテナに入る
3. ``npm run dev``
