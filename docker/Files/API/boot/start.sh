#!/bin/bash
/usr/sbin/php-fpm8.1 --nodaemonize --fpm-config /etc/php/8.1/fpm/php-fpm.conf -R >> /dev/stdout &
# cd /var/www/html && composer install
nginx -g "daemon off;"