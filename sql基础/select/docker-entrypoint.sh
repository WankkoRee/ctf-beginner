#!/bin/sh
rm $0

flag=$FLAG
unset FLAG
mysqld --user=root --skip-grant-tables &
until mysqladmin ping >/dev/null 2>&1
do
  sleep 0.1
done
mysql -uroot -e "
create database flag;
use flag;
create table flag(flag longtext);
insert into flag values ('$flag');
quit
"
nginx
php-fpm
