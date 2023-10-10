FROM alpine:3.18.4
LABEL org.opencontainers.image.authors="Wankko Ree"

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories

RUN apk add --no-cache openssh-server

EXPOSE 22

RUN apk add --no-cache sudo

RUN sed -i "s/#PermitRootLogin.*/PermitRootLogin yes/g" /etc/ssh/sshd_config && \
    ssh-keygen -t rsa -P "" -f /etc/ssh/ssh_host_rsa_key && \
    ssh-keygen -t ecdsa -P "" -f /etc/ssh/ssh_host_ecdsa_key && \
    ssh-keygen -t ed25519 -P "" -f /etc/ssh/ssh_host_ed25519_key && \
    addgroup -S stu && \
    adduser --disabled-password --gecos "Student User" --home "/home/stu" --ingroup "stu" --uid 1000 "stu" && \
    echo "stu ALL=(ALL) ALL" > /etc/sudoers.d/stu && \
    echo "Defaults lecture = never" >> /etc/sudoers.d/stu && \
    chmod 0440 /etc/sudoers.d/stu && \
    echo "stu:123456" | chpasswd

RUN apk add --no-cache vim nano

COPY ./docker-entrypoint.sh /

CMD ["/docker-entrypoint.sh"]
