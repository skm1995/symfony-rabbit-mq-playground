FROM php:8.0-fpm-alpine

RUN apk update && apk add supervisor

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd xdebug pdo_mysql amqp

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/messenger-worker.conf"]
