FROM nginx:1.28.0

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}
ENV NGINX_HOST_ROOT_DIRECTORY=/var/www/html

RUN addgroup --gid ${GID} dli
RUN adduser --uid ${UID} --ingroup dli --disabled-login --disabled-password dan
RUN sed -i 's/user  nginx;/user dan dli;/g' /etc/nginx/nginx.conf

WORKDIR ${NGINX_HOST_ROOT_DIRECTORY}

COPY ./default.conf /etc/nginx/conf.d/default.conf