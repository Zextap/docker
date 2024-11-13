FROM ubuntu
RUN apt update && apt install -y apache2
RUN apt install -y libapache2-mod-php php-mysql
RUN apt update && apt install -y mariadb-server
RUN apt update && apt install -y apache2 openssl

RUN mkdir -p /var/www/dawdb2 /var/www/fibo /etc/ssl/certs /etc/ssl/private

COPY ./dawdb2/dawdb2.conf /etc/apache2/sites-available/dawdb2.conf
COPY ./fibo/fibo.conf /etc/apache2/sites-available/fibo.conf

COPY ./fibo/my_cert_fibo.crt /etc/ssl/certs/my_cert_fibo.crt
COPY ./fibo/my_cert_fibo.key /etc/ssl/private/my_cert_fibo.key
COPY ./dawdb2/my_cert_daw.crt /etc/ssl/certs/my_cert_daw.crt
COPY ./dawdb2/my_cert_daw.key /etc/ssl/private/my_cert_daw.key

COPY ./dawdb2/index.php /var/www/dawdb2
COPY ./fibo/index.php /var/www/fibo

COPY ./db/bases.sql /docker-entrypoint-initdb.d/bases.sql

RUN a2dissite 000-default.conf

RUN a2enmod ssl
RUN a2ensite default-ssl.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN rm -rf /var/www/html
RUN sed -i "s/DirectoryIndex .*/DirectoryIndex index.php index.html/" /etc/apache2/mods-enabled/dir.conf

RUN a2ensite dawdb2.conf
RUN a2ensite fibo.conf
EXPOSE 80
EXPOSE 443

CMD ["bash","-c","/usr/bin/mysqld_safe & /usr/sbin/apache2ctl -D FOREGROUND"]
