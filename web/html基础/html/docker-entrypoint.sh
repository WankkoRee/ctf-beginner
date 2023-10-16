#!/bin/sh
rm $0

sed -i "s/###flag###/$FLAG/" /var/www/html/index.php
unset FLAG
nginx
php-fpm
