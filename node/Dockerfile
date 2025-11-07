FROM node:lts
RUN npm install -g browser-sync
WORKDIR /var/www/html
CMD ["browser-sync", "start", "--proxy", "nginx", "--files", "**/*.php, **/*.html, **/*.css, **/*.js", "--host", "0.0.0.0", "--port", "3000", "--ui-port", "3001"]
