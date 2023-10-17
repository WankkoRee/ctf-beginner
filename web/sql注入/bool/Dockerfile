FROM php:8.2.11-fpm-alpine3.18
LABEL org.opencontainers.image.authors="Wankko Ree"

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories

RUN apk add --no-cache nginx

EXPOSE 80

COPY default.conf /etc/nginx/http.d/default.conf

RUN docker-php-ext-install mysqli

RUN apk add --no-cache mysql mysql-client && \
    mkdir -p /run/mysqld && \
    mysql_install_db --user=root

COPY src /var/www/html/

COPY docker-entrypoint.sh /

CMD ["/docker-entrypoint.sh"]
