#!/bin/bash
set -e

HOST_UID=${HOST_UID:-$(stat -c %u /var/www/html 2>/dev/null || echo 1000)}
HOST_GID=${HOST_GID:-$(stat -c %g /var/www/html 2>/dev/null || echo 1000)}

CURRENT_UID=$(id -u www-data 2>/dev/null || echo 33)
CURRENT_GID=$(id -g www-data 2>/dev/null || echo 33)

if [ "$HOST_UID" != "$CURRENT_UID" ] || [ "$HOST_GID" != "$CURRENT_GID" ]; then
  echo "Remapping www-data to ${HOST_UID}:${HOST_GID} (host) ..."
  if getent group "${HOST_GID}" >/dev/null 2>&1; then
    existing_group=$(getent group "${HOST_GID}" | cut -d: -f1)
    if [ "${existing_group}" != "www-data" ]; then
      groupdel "${existing_group}" 2>/dev/null || true
    fi
  fi
  groupmod -o -g "${HOST_GID}" www-data 2>/dev/null || groupmod -g "${HOST_GID}" www-data
  if getent passwd "${HOST_UID}" >/dev/null 2>&1; then
    existing_user=$(getent passwd "${HOST_UID}" | cut -d: -f1)
    if [ "${existing_user}" != "www-data" ]; then
      userdel "${existing_user}" 2>/dev/null || true
    fi
  fi
  usermod -o -u "${HOST_UID}" -g "${HOST_GID}" www-data 2>/dev/null || usermod -u "${HOST_UID}" -g "${HOST_GID}" www-data
  echo "www-data now $(id www-data)"
fi

_run_as_www() {
  if [ "$(id -u)" = "0" ]; then
    gosu www-data "$@"
  else
    "$@"
  fi
}

if [ ! -f "artisan" ]; then
  echo "No Laravel found, installing fresh Laravel..."
  _run_as_www composer create-project laravel/laravel /tmp/laravel --prefer-dist --no-interaction
  cp -a /tmp/laravel/. /var/www/html/
  rm -rf /tmp/laravel
  chown -R www-data:www-data /var/www/html 2>/dev/null || true
fi

if [ ! -f ".env" ] && [ -f ".env.example" ]; then
  cp .env.example .env
  chown www-data:www-data .env 2>/dev/null || true
fi

if [ -f ".env" ]; then
  sed -i "s/DB_HOST=.*/DB_HOST=mysql/" .env 2>/dev/null || true
  sed -i "s/DB_PORT=.*/DB_PORT=3306/" .env 2>/dev/null || true
fi

if [ -f "artisan" ]; then
  if ! grep -q "APP_KEY=base64" .env 2>/dev/null; then
    _run_as_www php artisan key:generate --force 2>/dev/null || true
  fi
  chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
  chmod -R 775 storage bootstrap/cache 2>/dev/null || true
  until _run_as_www php artisan migrate --force 2>/dev/null; do
    echo "Waiting for MySQL..."
    sleep 3
  done
  chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
  chmod -R 775 storage bootstrap/cache 2>/dev/null || true
fi

if [ "$1" = "apache2-foreground" ] || [ "$1" = "apache2" ] || [ "$1" = "httpd-foreground" ]; then
  exec "$@"
else
  if [ "$(id -u)" = "0" ] && id www-data >/dev/null 2>&1; then
    exec gosu www-data "$@"
  else
    exec "$@"
  fi
fi
