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
create database you_cannot_find_me;
use you_cannot_find_me;
create table \`wow_-_you_found_me\`(this_name_is_too_long_to_input_for_you_and_all_others longtext);
insert into \`wow_-_you_found_me\` values ('$flag');
quit
"
nginx
php-fpm
