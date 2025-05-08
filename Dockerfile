# 使用 PHP 8.2 FPM 映像檔
FROM php:8.2-fpm

# 安裝系統與 PHP 套件
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 安裝 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 設定工作目錄
WORKDIR /var/www

# 複製專案檔案
COPY . .

# 安裝 Laravel 套件
RUN composer install --no-dev --optimize-autoloader

# 設定權限
RUN chown -R www-data:www-data storage bootstrap/cache

# Laravel 專案對外開放的 Port
EXPOSE 8000

# 啟動 Laravel 開發伺服器
CMD php artisan serve --host=0.0.0.0 --port=8000
