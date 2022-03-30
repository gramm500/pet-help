FROM node:latest

COPY ./node/scripts/ /tmp/scripts/

RUN chmod +x -R /tmp/scripts/

WORKDIR /var/www/html

ENTRYPOINT ["/tmp/scripts/init.sh"]
