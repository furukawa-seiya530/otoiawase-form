# お問い合わせフォーム

## 環境構築

### Dockerビルド

1. `git clone git@github.com:furukawa-seiya530/otoiawase-form.git`
2. `docker-compose up -d --build`

* MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて `docker-compose.yml` ファイルを編集してください。

### Laravel環境構築

1. `docker-compose exec php bash`
2. `composer install`
3. `.env.example` ファイルから `.env` を作成し、環境変数を変更
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan db:seed`

## 使用技術

- PHP 8.0
- Laravel 10.0
- MySQL 8.0

## ER図

下記はアプリケーションにおけるER図の構成図です。

![Untitled](https://github.com/user-attachments/assets/88a063c8-7e2b-451f-9a11-4ec6eff00c12)




- 開発環境: [http://localhost/](http://localhost/)
- phpMyAdmin: [http://localhost:8080/](http://localhost:8080/)


