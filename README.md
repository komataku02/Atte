Atte
#勤怠管理アプリ

##環境構築##

Dockerビルド

　1.git clone リンク 2.2docker-compose up -d --build

Laravel環境構築

　1.docker-compose exec php bash 2.composer install 3.cp .env.example .envを行い、環境変数を変更 4.php artisan key:generate 5.php artisan mirate 6.php artisan db:seed

##使用技術##

・PHP 8.2 ・Laravel 8.83.8 ・MySQL 15.1

##E-R図##

　(./index.drawio.png)

##URL##

・開発環境 : http://localhost/ ・phpMyAdmin : http://localhost:8080/
