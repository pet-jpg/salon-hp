FROM php:8.2-apache
# PostgreSQLに接続するための部品（ドライバー）をインストールする魔法の命令です
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo_pgsql
COPY . /var/www/html/