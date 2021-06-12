FROM node:latest as build-stage
WORKDIR /app
COPY ./TPI_subway_frontend/package*.json ./
RUN npm install
COPY ./TPI_subway_frontend/ .
RUN npm run build

FROM nginx as production-stage
RUN mkdir /app
COPY --from=build-stage /app/dist /app
COPY nginx.conf /etc/nginx/nginx.conf 