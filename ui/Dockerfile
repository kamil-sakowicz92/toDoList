FROM node:10-alpine
WORKDIR /app
ADD ./package*.json /app/
RUN npm install
COPY . .
CMD npm run start
