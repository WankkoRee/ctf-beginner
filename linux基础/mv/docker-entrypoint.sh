#!/bin/ash
rm $0

flag=$FLAG
unset FLAG
dd if=/dev/urandom of="/home/stu/mv_me" bs=1M count="2"
md5=$(md5sum /home/stu/mv_me | awk '{print $1}')
/usr/sbin/sshd
while true
do
  sleep 0.1
  if [ ! -e "/home/stu/mv_me" ] && [ -f "/home/stu/only/one" ] && [ "$(md5sum /home/stu/only/one | awk '{print $1}')" = $md5 ]
  then
    echo $flag > /flag
  else
    rm -rf /flag
  fi
done
