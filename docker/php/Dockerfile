FROM php:8.0-fpm
RUN apt-get update  \
	&& apt-get install -y  \
    && pecl install xdebug-3.0.0 \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable xdebug  \
    && apt-get -y install git
