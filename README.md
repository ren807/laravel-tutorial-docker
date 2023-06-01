# laravel-tutorial-docker

## 初回

1. laravel-tutorial-dockerリポジトリをClone
2. ``cd docker``で/dockerディレクトリに移動
3. mailpitリポジトリをClone ( https://github.com/axllent/mailpit )
4. ``cd mailpit``で/docker/mailpitディレクトリに移動
5. ``git checkout master``でmasterブランチに切り替え
6. ``cd ../../``で/ディレクトリに移動
7. ``docker-compose build``でイメージを作成
8. ``docker-compose up -d``でコンテナを作成・起動
9. ``docker-compose exec app bash``でappコンテナに入る
10. ``npm install``でパッケージをインストール
11. ``comopser install``でパッケージをインストール
12. /laravel-projectディレクトリに.envファイルを作成 ( .env.exampleファイルをコピー )
13. ``chown www-data storage/ -R``でstorage配下の所有者を変更
14. ``php artisan key:generate``でAPP_KEYを生成
15. ``npm run dev``

## 2回目以降

1. ``docker-compose up -d``でコンテナを起動
2. ``docker-compose exec app bash``でappコンテナに入る
3. ``npm run dev``
