#!/bin/ash
rm $0

flag=$FLAG
unset FLAG
echo "world: hello?" > /home/stu/edit_me && chown stu:stu /home/stu/edit_me
/usr/sbin/sshd
while true
do
  sleep 0.1
  if [ "$(cat /home/stu/edit_me)" = "hello world!" ]
  then
    echo $flag > /flag
  else
    rm -rf /flag
  fi
done
