#!/bin/ash
rm $0

echo $FLAG > "/home/stu/.$FLAG"
unset FLAG
/usr/sbin/sshd -D
