### Требования:
* docker
* docker-compose
* git

#### Установка зависимостей
* [docker](https://docs.docker.com/install/linux/docker-ce/ubuntu/)
* [docker-compose](https://docs.docker.com/compose/install/#install-compose)

### Сервисы:
1. nginx
2. mysql
3. pma
4. php (contains installed git and composer)

### Конфигурация:
Вся конфигурация в поддиректориях сервисов

### Файлы приложения:
Все файлы приложения в родительской директории относительно директории docker (../)

### Ссылки(dev):
* web-server: [http://localhost:8080/](http://localhost:8080/)
* PMA: [http://localhost:8081/](http://localhost:8081/)

### FIRST START APP:
```bash
cp .env.example .env
cp docker/.env.example docker/.env
sudo chown -R www-data:www-data storage

cd docker && docker-compose up --build

docker exec -ti php bash -c 'composer install'
docker exec -ti php bash -c 'php artisan migrate'
docker exec -ti php bash -c 'php artisan storage:link'
```

### RUN
```bash
cd docker && docker-compose up
```
