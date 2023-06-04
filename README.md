# laravel-tutorial-docker

## Dockerの起動手順

### 初回

1. laravel-tutorial-dockerリポジトリをClone
2. ``cd docker``でdockerディレクトリに移動
3. mailpitリポジトリをClone ( https://github.com/axllent/mailpit )
4. ``cd mailpit``でdocker/mailpitディレクトリに移動
5. ``git checkout master``でmasterブランチに切り替え
6. ``cd ../../``で/ディレクトリに移動
7. ``docker-compose build``でイメージを作成
8. ``docker-compose up -d``でコンテナを作成・起動
9. ``docker exec -it laravel-tutorial-app /bin/bash``でlaravel-tutorial-appコンテナに入る
10. ``npm install``でパッケージをインストール
11. ``comopser install``でパッケージをインストール
12. laravel-projectディレクトリに.envファイルを作成 ( .env.exampleファイルをコピー )
13. ``chown www-data storage/ -R``でstorage配下の所有者を変更
14. ``php artisan key:generate``でAPP_KEYを生成
15. ``npm run dev``
16. ``http://localhost:8000/``にアクセス

### 2回目以降

1. ``docker-compose up -d``でコンテナを起動
2. ``docker exec -it laravel-tutorial-app /bin/bash``でlaravel-tutorial-appコンテナに入る
3. ``npm run dev``
4. ``http://localhost:8000/``にアクセス

## 参考

* 作成したアプリ：https://bootcamp.laravel.com/blade/installation
* 環境構築：https://www.kagoya.jp/howto/cloud/container/docker_laravel/

## 詰まったところのメモ

### Node.jsのインストール

docker/php/Dockerfileに以下を追加。

```diff
RUN mv composer.phar /usr/local/bin/composer

+ RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
+ RUN apt-get install -y nodejs

ENV COMPOSER_ALLOW_SUPERUSER 1
```

最初はこちらを参考にしていましたが、<br>
https://qiita.com/nozomi_nozomi/items/6b6bcf824b56c04bdc26

バージョンによるエラーが出たので最終的に参考にしたのはこちら。<br>
https://qiita.com/syisdreaming/items/ffa4843a1804140fbf26

### GETパラメータが取得できない

docker/nginx/default.confを以下のように修正。

```diff
- try_files $uri $uri/ /index.php$query_string;
+ try_files $uri $uri/ /index.php?$query_string;
```

参考：https://qiita.com/yuuum/items/0b0591bd558f8cd13851
