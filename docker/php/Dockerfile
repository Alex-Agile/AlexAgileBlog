FROM php:7.1.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libicu-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libmemcached-dev \
    libpng12-dev \
    zlib1g-dev

# install extensions
RUN docker-php-ext-install \
    gd \
    json \
    mcrypt \
    pdo_mysql

# install pecl extensions
RUN pecl install \
    apcu-beta \
    memcached \
    redis \
    xdebug \
    zip \
    && docker-php-ext-enable \
        apcu \
        memcached \
        redis \
        xdebug \
        zip

# Compile and install latest version of intl extension
RUN curl -sS -o /tmp/icu.tar.gz -L http://download.icu-project.org/files/icu4c/57.1/icu4c-57_1-src.tgz \
    && tar -zxf /tmp/icu.tar.gz -C /tmp && cd /tmp/icu/source \
    && ./configure --prefix=/usr/local && make && make install

RUN docker-php-ext-configure intl --with-icu-dir=/usr/local \
    && docker-php-ext-install intl
