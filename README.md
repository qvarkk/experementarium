# Установка
```
$ cp .env.example .env
$ composer install
$ docker-compose up -d
```
### После чего необходимо подключиться к контейнеру приложения

```
$ docker exec -it exp bash
```

### После подключения выполнить следующие команды
```
$ php artisan key:generate
$ npm install
```

# Запуск
### Тоже выполнять внутри контейнера
```
$ npx vite --host
```
