FROM bitnami/php-fpm:7.3-prod
RUN apt-get update && apt-get install -y autoconf build-essential libcurl4-openssl-dev pkg-config libssl-dev
RUN pecl install mongodb
RUN echo "extension=mongodb.so" >> /opt/bitnami/php/etc/php.ini
