# Media Buying

This is a personal Docker setup for Wordpress site.

## Requirement

* [Docker](https://hub.docker.com/)
* [Make command](https://gist.github.com/evanwill/0207876c3243bbb6863e65ec5dc3f058#make) ( For windows )

## Usage

Write to hosts file
```
#dev.xp-banks.ru
127.0.0.1 dev.xp-banks.ru
```                    
```
git clone https://gitlab.com/x574/dev/xp-banks.git
cd <project-name>
make up
```

## Links

- gitlab:   https://gitlab.com/x574/dev/banks-trafficback.git
- dev copy: http://dev.xp-banks.ru
- database: http://dev.xp-banks.ru:8085

## Credentials

MySQL root:

**User**: `root`  
**Password**: `password`

MySQL access:

**User**: `wordpress`  
**Password**: `wordpress`  
**Database**: `wordpress`  
**Host**: `mariadb`  

## Directory Structure

* `www` - The web root of your web application.

## Commands

`make help` - Print commands help.  
`make up` - Start containers.  
`make down` - Stop containers.  
`make start` - Start containers without updating.  
`make stop` - Stop containers.  
`make shell` - Access `php` container via shell.  
`make wp` - Executes `wp cli` command in a specified `WP_ROOT` directory (default is `/var/www/html/`).  
