FROM php:8.3-apache

ARG UID=1000
ARG GID=1000

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev libicu-dev libfreetype6-dev libjpeg62-turbo-dev gosu \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN set -eux; \
    if getent group "${GID}" >/dev/null 2>&1; then \
      existing_group=$(getent group "${GID}" | cut -d: -f1); \
      if [ "${existing_group}" != "www-data" ]; then groupdel "${existing_group}" || true; fi; \
    fi; \
    groupmod -o -g "${GID}" www-data; \
    if getent passwd "${UID}" >/dev/null 2>&1; then \
      existing_user=$(getent passwd "${UID}" | cut -d: -f1); \
      if [ "${existing_user}" != "www-data" ]; then userdel "${existing_user}" || true; fi; \
    fi; \
    usermod -o -u "${UID}" -g "${GID}" www-data; \
    mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache; \
    chown -R www-data:www-data /var/www

ENV APACHE_RUN_USER=www-data
ENV APACHE_RUN_GROUP=www-data

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

COPY . .

RUN if [ -f composer.json ]; then composer install --no-scripts --no-autoloader --prefer-dist --no-interaction || true; fi \
    && if [ -f composer.json ]; then composer dump-autoload --optimize || true; fi \
    && chown -R www-data:www-data /var/www/html 2>/dev/null || true \
    && chmod -R 775 storage bootstrap/cache 2>/dev/null || true

EXPOSE 80

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
