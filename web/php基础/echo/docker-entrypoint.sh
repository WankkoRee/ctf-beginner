#!/bin/sh
rm $0

sed -i "s/###flag###/$FLAG/" /var/www/html/flag.php
unset FLAG
nginx
php-fpm
