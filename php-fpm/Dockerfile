FROM php:fpm-alpine

# Install necessaries for PDO PSQL
RUN apk add libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

CMD ["php-fpm"]
EXPOSE 9000
