#!/bin/ash
rm $0

flag=$FLAG
unset FLAG
touch /home/stu/chmod_me && chown stu:stu /home/stu/chmod_me && chmod 775 /home/stu/chmod_me
/usr/sbin/sshd
while true
do
  sleep 0.1
  if [ $(stat -c "%a" /home/stu/chmod_me) -eq 641 ]
  then
    echo $flag > /flag
  else
    rm -rf /flag
  fi
done
