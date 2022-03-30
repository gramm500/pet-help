FROM php:8.0-fpm

ARG user
ARG uid

COPY ./php/scripts/ /tmp/scripts/

RUN chmod +x -R /tmp/scripts/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

ENTRYPOINT ["/tmp/scripts/init.sh"]

EXPOSE 9000

CMD ["php-fpm"]
