FROM php:7.4-fpm
RUN apt-get update && apt-get install -y git gnupg
RUN docker-php-ext-install opcache
RUN docker-php-ext-install pdo_mysql
COPY ./config/php.ini /usr/local/etc/php/php.ini
# Install Composer and make it available in the PATH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
RUN curl -sL https://deb.nodesource.com/setup_6.x | bash -