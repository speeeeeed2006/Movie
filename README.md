# Outsourcing-api

### Requirements

- Install [**Docker**](https://docs.docker.com/install/linux/docker-ce/ubuntu/#extra-steps-for-aufs)
- Install [**Docker-compose**](http://docs.docker.com/compose/install/)
- Install **git** `sudo apt install git`
 
### Optionals

- Install [**Postman**](https://www.getpostman.com/apps) or a similar tool

### Install

**1.** Clone this repository
```bash
git clone git@github.com:speeeeeed2006/Movie.git
cd Movie
```

**2.** Copy `.env.dist` to `.env`
```bash
cp .env.dist .env
```

**3.** Builds, (re)creates and starts containers in the background
```bash
docker-compose pull
docker-compose up -d
```

### Usage
Swagger documentation URL : [http://localhost:8443](http://localhost:8443)

**Some utils commands**

- Container list
```bash
docker-compose ps
```

- Start a container
```bash
docker-compose start php
```

- Stop a container
```bash
docker-compose stop php
```

- Restart a container
```bash
docker-compose restart php
```
