FROM alpine:3.18.4
LABEL org.opencontainers.image.authors="Wankko Ree"

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories

EXPOSE 3000

COPY ./docker-entrypoint.sh /

CMD ["/docker-entrypoint.sh"]
