#!/bin/ash
rm $0

mkdir -p /etc/maybe/you/can/find/the/ && echo $FLAG > /etc/maybe/you/can/find/the/flag
unset FLAG
/usr/sbin/sshd -D
