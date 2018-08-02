FROM php:7.2-fpm

# System Dependencies.
RUN apt-get update && apt-get install -y \
#sed -i 's/deb.debian.org/mirrors.cloud.tencent.com/g' /etc/apt/sources.list \
        git \
        imagemagick \
        libicu-dev \
        # Required for SyntaxHighlighting
        python3 \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
    --no-install-recommends && rm -r /var/lib/apt/lists/*

# Install the PHP extensions we need
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && docker-php-ext-install mbstring mysqli opcache intl gd

# Install the default object cache.
RUN pecl channel-update pecl.php.net \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && apt-get autoremove -y --purge \
    && apt-get clean \
    && rm -Rf /tmp/*

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=4000'; \
        echo 'opcache.revalidate_freq=60'; \
        echo 'opcache.fast_shutdown=1'; \
        echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/opcache-recommended.ini