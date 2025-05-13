## Как развернуть

1. Собрать контейнеры <br>```docker-compose build```
2. Поднять контейнеры  <br>```docker-compose up -d```
3. Установить зависимости композер ```docker-compose run --rm -u root app composer i```
4. Выполнить миграции и заполнить БД ```docker-compose run --rm app php artisan migrate --seed```
