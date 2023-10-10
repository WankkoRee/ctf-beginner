FROM debian:12.1-slim
LABEL org.opencontainers.image.authors="Wankko Ree"

RUN echo "Acquire::http::Pipeline-Depth \"0\";" > /etc/apt/apt.conf.d/99nopipelining && \
    sed -i 's#deb.debian.org#mirrors.ustc.edu.cn#g' /etc/apt/sources.list.d/debian.sources && \
    rm -Rf /var/lib/apt/lists/* && \
    apt update && \
    apt install -y apt-transport-https ca-certificates && \
    rm -rf /var/cache/apt/lists && \
    sed -i 's#http://#https://#g' /etc/apt/sources.list.d/debian.sources && \
    rm -Rf /var/lib/apt/lists/* && \
    apt update

RUN apt install -y openssh-server && \
    rm -rf /var/cache/apt/lists

EXPOSE 22

RUN apt install -y sudo && \
    rm -rf /var/cache/apt/lists && \
    mkdir /run/sshd

RUN sed -i "s/#PermitRootLogin.*/PermitRootLogin yes/g" /etc/ssh/sshd_config && \
    addgroup stu && \
    adduser --disabled-password --gecos "Student User" --home "/home/stu" --ingroup "stu" --uid 1000 "stu" && \
    echo "stu ALL=(ALL) ALL" > /etc/sudoers.d/stu && \
    echo "Defaults lecture = never" >> /etc/sudoers.d/stu && \
    chmod 0440 /etc/sudoers.d/stu && \
    echo "stu:123456" | chpasswd

COPY ./docker-entrypoint.sh /

CMD ["/docker-entrypoint.sh"]
