#!/bin/sh
rm $0

flag=$FLAG
unset FLAG
database=$(cat /dev/urandom | head -n 10 | md5sum | head -c 10);
table=$(cat /dev/urandom | head -n 10 | md5sum | head -c 10);
mysqld --user=root --skip-grant-tables &
until mysqladmin ping >/dev/null 2>&1
do
  sleep 0.1
done
mysql -uroot -e "
create database web;
use web;
create table users
(
  id int(3) not null auto_increment,
  username varchar(20) not null,
  password varchar(20) not null,
  primary key (id)
);
insert into users values
  ('1', 'Dumb', 'Dumb'),
  ('2', 'Angelina', 'I-kill-you'),
  ('3', 'Dummy', 'p@ssword'),
  ('4', 'secure', 'crappy'),
  ('5', 'stupid', 'stupidity'),
  ('6', 'superman', 'genious'),
  ('7', 'batman', 'mob!le'),
  ('8', 'admin', 'admin');

create database \`$database\`;
use \`$database\`;
create table \`$table\`(flag longtext);
insert into \`$table\` values ('$flag');
quit
"
nginx
php-fpm
