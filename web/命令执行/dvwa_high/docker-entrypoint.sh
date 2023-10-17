#!/bin/sh
rm $0

echo $FLAG > /flag
unset FLAG
nginx
php-fpm
