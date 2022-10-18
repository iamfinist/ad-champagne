FROM php:7.4-fpm-alpine
WORKDIR /var/www/html/

ENV DEPENDENSIES="git libzip mysql-client curl php-intl"
ENV BUILD_DEPENDENSIES="g++ make autoconf icu-dev"
ENV EXTENSIONS="pdo_mysql mysqli bcmath sockets"

RUN apk update && apk upgrade \
    && apk add --no-cache --virtual build-deps ${BUILD_DEPENDENSIES} \
    && apk add --no-cache ${DEPENDENSIES} \
    && docker-php-ext-install ${EXTENSIONS} \
    && apk del build-deps \
    && rm -rf /tmp/* \
    && rm -rf /var/cache/apk/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer