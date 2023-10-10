#!/bin/ash
rm $0

mkdir -p /var/log/no/one/can/find/ && echo $FLAG > /var/log/no/one/can/find/me
unset FLAG
/usr/sbin/sshd -D
