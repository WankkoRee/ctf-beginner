#!/bin/ash
rm $0

mkdir -p "/home/stu/$FLAG" && usermod -d "/home/stu/$FLAG" stu
unset FLAG
/usr/sbin/sshd -D
