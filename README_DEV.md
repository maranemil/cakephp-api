## Docker 
~~~
# create new project
# composer create-project --prefer-dist cakephp/app:~4.0 my_app_api
~~~

### start docker dev
~~~shell
/usr/bin/docker compose -f deploy/dev/docker-compose.yml -p cakephp-api-dev up -d --remove-orphans --force-recreate --pull always
~~~

### stop docker dev
~~~shell
/usr/bin/docker compose -f deploy/dev/docker-compose.yml -p cakephp-api-dev stop web-api --remove-orphans
~~~

### composer install
~~~shell
#docker exec -it cakephp-api sh -c "cd my_app_api && composer install --no-interaction"
#docker exec -it cakephp-api sh -c "cd my_app_api && composer require codeception/codeception --dev -n"
#docker exec -it cakephp-api sh -c "cd my_app_api && composer require codeception/module-phpbrowser --dev -n"
#docker exec -it cakephp-api sh -c "cd my_app_api && composer require codeception/module-asserts --dev -n"
#docker exec -it cakephp-api sh -c "cd my_app_api && composer require monolog/monolog --dev -n"

# composer require --dev phpstan/phpstan
# composer require "codeception/codeception" --dev

# composer require cakephp/migrations "@stable"
# bin/cake plugin load Migrations
# src/Application.php file and adding the following statement: $this->addPlugin('Migrations');
~~~

## API endpoints

### message: welcome
~~~shell
xdg-open  http://localhost/my_app_api/index.php/api/index
~~~

### message: hello
~~~shell
xdg-open  http://localhost/my_app_api/index.php/api/hello
~~~

### message: howareyou
~~~shell
xdg-open  http://localhost/my_app_api/index.php/api/how-are-you
~~~

### message: whattimeisit
~~~shell
xdg-open  http://localhost/my_app_api/index.php/api/whattimeisit
~~~

### message: whattimeisit in london (without POST)
~~~shell
xdg-open  http://localhost/my_app_api/index.php/api/whattimeisit/in/london
~~~


### Codeception tests run all test once
~~~shell
docker exec -it cakephp-api sh -c "cd my_app_api && php vendor/bin/codecept run"
~~~


### run PHPStan
~~~shell
docker exec -it cakephp-api sh -c "cd my_app_api && vendor/bin/phpstan analyse src -c phpstan.neon"
~~~


### run shell
~~~shell
# cd my_app_api/
# chmod +x bin/cake
docker exec -it cakephp-api sh -c "cd my_app_api && bin/cake hello"
~~~

### run command
~~~shell
# cd my_app_api/
# chmod +x bin/cake
docker exec -it cakephp-api sh -c "cd my_app_api && bin/cake helloo"
~~~




### Migrate
~~~shell
# https://book.cakephp.org/migrations/2/en/index.html
# https://book.cakephp.org/migrations/3/en/index.html
# https://book.cakephp.org/phinx/0/en/migrations.html
# https://book.cakephp.org/migrations/2/en/index.html
# https://book.cakephp.org/2/en/appendices/2-0-migration-guide.html
# https://phinx.org/
# chmod +x bin/cake
docker exec -it cakephp-api sh -c "cd my_app_api && bin/cake migrations migrate"
# bin/cake migrations rollback
# bin/cake migrations rollback -t 20150103081132
# bin/cake bake migration CreateProducts name:string description:text created modified
# bin/cake migrations migrate
# bin/cake migrations migrate -t 20150103081132
# bin/cake migrations status
# bin/cake migrations status --format json
# bin/cake migrations dump
# bin/cake migrations migrate --no-lock
# bin/cake migrations rollback --no-lock
# bin/cake bake migration_snapshot MyMigration --no-lock
~~~

