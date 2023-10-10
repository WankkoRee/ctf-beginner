#!/bin/bash
rm $0

flag=$FLAG
unset FLAG
/usr/sbin/sshd
while true
do
  (exec -a $flag sleep 666)
done
