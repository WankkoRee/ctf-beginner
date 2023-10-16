#!/bin/sh
rm $0

sed -i "s@###flag###@$(echo -n $FLAG | base64)@" /var/www/html/main.js
unset FLAG
nginx
php-fpm
