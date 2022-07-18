FROM php:7.0.33-apache

COPY helloworld.apache.conf /usr/local/apache2/conf/helloworld.apache.conf

RUN echo "Include /usr/local/apache2/conf/helloworld.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf

RUN apt-get update
RUN apt-get install -y autoconf pkg-config libssl-dev
RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN pecl install xdebug-2.9.0
RUN pecl install mongodb-1.2.2
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini

# check if mongodb extension exists
# RUN ls -l /usr/local/lib/php/extensions/no-debug-non-zts-20151012
# RUN docker-php-ext-enable /usr/local/lib/php/extensions/no-debug-non-zts-20151012/mongodb.so
