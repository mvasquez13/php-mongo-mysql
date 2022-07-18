# php-mongo-mysql
https://github.com/mvasquez13/php-mongo-mysql
### Project Structure

```bash
├── docker
│   ├── web_frontend
│   │   ├── Dockerfile
│   │   └── helloworld.apache.conf  
│   └── xdebug
│       ├── xdebug.ini.dev              # File linked to dev environment
│       └── xdebug.ini.prod             # File linked to prod environment
├── docker-compose-dev.yml         
├── docker-compose.yml
├── README.md
├── .env                                # Contains the environment variables used by the containers
└── src
    ├── connection_mongodb.php           
    ├── connection_mysql.php
    ├── create.php                      # File used to CRUD operation -> Create
    ├── db_test.php                     # File used to test connections to mysql and mongodb 
    ├── delete.php                      # File used to CRUD operation -> Delete
    ├── head.php                        # Contains js lib
    ├── index.php                       
    └── update.php                      # File used to CRUD operation -> Update
```

## Quick usage


### Enable / Disable xdebug

You have to set the variable 'remote_enable' to activate(0) or disable (0). Depends on your environment you should select the correct file xdebug.ini.dev or xdebug.ini.prod

```shell
xdebug.remote_enable=1
```

### Development stage

```shell
docker-compose -f docker-compose.yml -f docker-compose-dev build
docker-compose -f docker-compose.yml -f docker-compose-dev up
```

### Production stage

```shell
docker-compose -f docker-compose.yml build
docker-compose -f docker-compose.yml up
```


### Resources

- Php files were modified from https://www.tutsmake.com/crud-php-mysql-bootstrap-example-tutorial/