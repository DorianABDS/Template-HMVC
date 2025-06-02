FROM node:18-alpine AS builder

WORKDIR /app

COPY frontend/package.json ./
RUN npm install

RUN npx tailwindcss init -p

COPY frontend/ ./
RUN npm run build

FROM nginx:alpine
COPY --from=builder /app/dist /usr/share/nginx/html
COPY frontend/docker/nginx/default.conf /etc/nginx/conf.d/default.conf
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
