#!/bin/ash
rm $0

flag=$FLAG
unset FLAG
touch /home/stu/world && chown stu:stu /home/stu/world && mkdir /home/stu/hello && chown stu:stu /home/stu/hello && touch /home/stu/hello/world && chown stu:stu /home/stu/hello/world
/usr/sbin/sshd
while true
do
  sleep 0.1
  if [ ! -e "/home/stu/world" ] && [ ! -e "/home/stu/hello" ]
  then
    echo $flag > /flag
  else
    rm -rf /flag
  fi
done
