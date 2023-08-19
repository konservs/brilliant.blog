FROM node:18-alpine3.18 as base
ARG NODE_ENV=docker
ARG VERSION=1.0.0



FROM nginx:stable-bullseye as nginx
WORKDIR /usr/share/nginx/html
ADD docker/nginx/default.conf /etc/nginx/conf.d
EXPOSE 80


FROM nginx:stable-bullseye as static
WORKDIR /usr/share/nginx/html
ADD nginx/default.conf /etc/nginx/conf.d
EXPOSE 80


