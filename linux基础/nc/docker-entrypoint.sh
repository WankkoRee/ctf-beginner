#!/bin/ash
rm $0

while true
do
  echo $FLAG | nc -l -p 3000
done
/usr/sbin/sshd -D
