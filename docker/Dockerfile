FROM php:8.1-fpm-alpine

LABEL maintainer="Diego Brocanelli <diegod2@msn.com>"

RUN apk update && \
    apk upgrade && \
    apk add --no-cache openssl \
        bash \
        vim \
        mysql-client \
        nodejs \
        npm \
        unzip \
        autoconf \
        g++ \
        zlib-dev \
        make

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install -o -f xdebug && \
    docker-php-ext-enable xdebug && \
    rm -rf /tmp/pear

COPY ./xdebug.ini $PHP_INIT_DIR/conf.d/

EXPOSE 9000

ENTRYPOINT ["php-fpm"]
