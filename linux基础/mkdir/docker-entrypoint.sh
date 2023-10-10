#!/bin/ash
rm $0

flag=$FLAG
unset FLAG
/usr/sbin/sshd
while true
do
  sleep 0.1
  if [ -d "/home/stu/world" ]
  then
    echo $flag > /flag
  else
    rm -rf /flag
  fi
done
