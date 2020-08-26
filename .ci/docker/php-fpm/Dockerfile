ARG VERSION

FROM php:${VERSION}-fpm-alpine

ENV PHPIZE_DEPS \
    make \
    cmake \
    build-base \
    bzip2-dev \
    openssl-dev \
    pkgconf \
    popt-dev \
    autoconf \
    icu-libs \
    icu-dev \
    libgcc \
    musl \
    php-intl \
    libc-dev \
    pcre-dev \
    re2c \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libxslt-dev icu-dev \
    libmemcached-dev

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev shadow

ARG UID
ARG GID

RUN usermod -u $UID www-data && \
        groupmod -g $GID www-data

RUN apk update \
    && apk upgrade \
    && apk add --no-cache gcc make g++ icu-dev zlib-dev autoconf \
    && rm -rf /var/cache/apk/*

# fix timezone
ARG TIMEZONE
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo ${TIMEZONE} > /etc/timezone \
    && date

COPY /conf.d/custom.ini /usr/local/etc/php/conf.d/
COPY /php-fpm.d/custom.conf /usr/local/etc/php/php-fpm.d/

# Install extensions
RUN docker-php-ext-install pdo pdo_pgsql sockets
#RUN pecl install redis && docker-php-ext-enable redis

ARG XDEBUG_REMOTE_HOST
ARG XDEBUG_REMOTE_PORT
ARG XDEBUG_IDEKEY

# Install xdebug (2.9.0 have a bug)
RUN pecl install xdebug-2.9.0 \
    && docker-php-ext-enable xdebug \
    && echo -e "\
xdebug.remote_host=${XDEBUG_REMOTE_HOST}\n\
xdebug.remote_port=${XDEBUG_REMOTE_PORT}\n\
xdebug.max_nesting_level=1000\n\
xdebug.idekey=${XDEBUG_IDEKEY}"\
> /usr/local/etc/php/conf.d/custom.ini

# Install mongodb extension
#RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN set -xe \
    && ln -s /usr/lib /usr/local/lib64 \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
    && docker-php-ext-configure intl --enable-intl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) \
        intl gd

# Install memcached extension
RUN pecl install memcached-3.1.5 \
    && docker-php-ext-enable memcached

# Install supervisord
RUN apk add --update supervisor && rm  -rf /tmp/* /var/cache/apk/*
COPY ./supervisor/supervisord.conf /etc/supervisord.conf

# Setup rules
RUN chown -R www-data:www-data /var/www
WORKDIR /var/www/html/

# Prepare supervisord logs
RUN mkdir /var/supervisord/ && mkdir /var/supervisord/logs

EXPOSE 9000 9001

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]