#!/bin/ash
rm $0

echo $FLAG > /flag && chmod 0400 /flag
unset FLAG
/usr/sbin/sshd -D
