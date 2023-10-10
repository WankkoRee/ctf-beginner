#!/bin/bash
rm $0

flag=$FLAG
unset FLAG
/usr/sbin/sshd
while true
do
  (exec -a "kill me please!" sleep 10) &
  wait $!
  if [ $? -ne 0 ]
  then
    break
  fi
done
echo $flag > /flag
while true
do
  sleep 1
done
