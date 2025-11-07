FROM php:8.4-fpm

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}
ENV PHP_HOST_ROOT_DIRECTORY=/var/www/html

RUN addgroup --system --gid ${GID} dli
RUN adduser --system --home /bin/sh --no-create-home --uid ${UID} --ingroup dli --disabled-login --disabled-password dan

RUN sed -i 's/user = www-data/user = dan/g' /usr/local/etc/php-fpm.d/www.conf
RUN sed -i 's/group = www-data/group = dan/g' /usr/local/etc/php-fpm.d/www.conf

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions \
    @composer \
    pdo_mysql \
    opcache \
    zip \
    intl

RUN docker-php-ext-install mysqli

WORKDIR ${PHP_HOST_ROOT_DIRECTORY}

COPY ./php.ini /usr/local/etc/php/php.ini

USER dan

