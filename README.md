# Запуск
### Вместо ???? выбрать prod или dev

```
$ chmod 777 storage -R
$ docker-compose -f docker-compose.????.yml up -d
```
### После чего необходимо подключиться к контейнеру приложения

```
$ docker exec -it exp bash
```

### После подключения выполнить следующие команды
```
$ composer install
$ npm install
$ npm run build
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate:fresh --seed
```
