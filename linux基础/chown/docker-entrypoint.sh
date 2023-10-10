#!/bin/ash
rm $0

flag=$FLAG
unset FLAG
touch /home/stu/chown_me && chown stu:stu /home/stu/chown_me
/usr/sbin/sshd
while true
do
  sleep 0.1
  if [ "$(stat -c "%U" /home/stu/chown_me):$(stat -c "%G" /home/stu/chown_me)" = "stu:root" ]
  then
    echo $flag > /flag
  else
    rm -rf /flag
  fi
done
