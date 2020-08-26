ARG VERSION

FROM nginx:${VERSION}-alpine

ARG TIMEZONE
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo ${TIMEZONE} > /etc/timezone \
    && date

RUN mkdir -p /etc/nginx/logs
RUN mkdir -p /etc/nginx/ssl

COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./conf.d/ /etc/nginx/conf.d/