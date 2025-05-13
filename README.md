## Как развернуть

1. Собрать контейнеры <br>```docker-compose build```
2. Поднять контейнеры  <br>```docker-compose up -d```
3. Установить зависимости композер ```docker-compose run --rm -u root app composer i```
4. Выполнить миграции и заполнить БД ```docker-compose run --rm app php artisan migrate --seed```


В БД будет создан пользователь 
username: admin
password: 1234

Для тестирования указываем в BasicAuth: 
Username: admin
Password: 1234

Без них 401 ошибка.
