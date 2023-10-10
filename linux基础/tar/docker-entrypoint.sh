#!/bin/ash
rm $0

length=${#FLAG}
half_length=$((length / 2))
echo "${FLAG:0:half_length}" > /flag1
echo "${FLAG:half_length:length}" > /flag2
unset FLAG
tar -cf /flag1.tar /flag1
tar -czf /flag2.tar.gz /flag2
rm /flag1 /flag2
/usr/sbin/sshd -D
