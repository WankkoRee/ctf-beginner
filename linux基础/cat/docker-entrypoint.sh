#!/bin/ash
rm $0

echo $FLAG > /flag
unset FLAG
/usr/sbin/sshd -D
