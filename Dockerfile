# php:8.0-apache (Debian bullseye) uz nema apt repozitare (404), preto 8.3 na bookworme. Legacy mysql_* volania riesia shimy vo functions.php.
FROM php:8.3-apache

RUN a2enmod rewrite && a2dismod -f cgid cgi && echo "ServerName lzk.tronic.sk" > /etc/apache2/conf-enabled/servername.conf && \
    apt-get update -y && \
    apt-get install -y --no-install-recommends libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j"$(nproc)" mysqli gd zip

USER www-data

COPY ./html /var/www/html
