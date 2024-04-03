## Docker 
~~~
# create new project
# composer create-project --prefer-dist cakephp/app:~4.0 my_app_api
~~~

### start docker
~~~shell
/usr/bin/docker compose -f docker-compose.yml -p cakephp-api up -d
~~~

### stop docker
~~~shell
/usr/bin/docker compose -f docker-compose.yml -p cakephp-api stop web-api
~~~

### composer install
~~~shell
docker exec -it cakephp-api sh -c "cd my_app_api && composer install --no-interaction"
docker exec -it cakephp-api sh -c "cd my_app_api && composer require codeception/codeception --dev -n"
docker exec -it cakephp-api sh -c "cd my_app_api && composer require codeception/module-phpbrowser --dev -n"
docker exec -it cakephp-api sh -c "cd my_app_api && composer require codeception/module-asserts --dev -n"
docker exec -it cakephp-api sh -c "cd my_app_api && composer require monolog/monolog --dev -n"
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

## Codeception tests

### run all test once
~~~shell
docker exec -it cakephp-api sh -c "cd my_app_api && php vendor/bin/codecept run"
~~~

~~~shell
# cd my_app_api/
# chmod +x bin/cake
docker exec -it cakephp-api sh -c "cd my_app_api && bin/cake hello"
~~~