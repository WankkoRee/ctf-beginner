#!/bin/ash
rm $0

flag=$FLAG
unset FLAG
dd if=/dev/urandom of="/home/stu/cp_me" bs=1M count="2"
md5=$(md5sum /home/stu/cp_me | awk '{print $1}')
/usr/sbin/sshd
while true
do
  sleep 0.1
  if [ -f "/home/stu/cp_me" ] && [ -f "/home/stu/another/one" ] && [ "$(md5sum /home/stu/another/one | awk '{print $1}')" = $md5 ]
  then
    echo $flag > /flag
  else
    rm -rf /flag
  fi
done
