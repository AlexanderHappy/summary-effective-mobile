## Как развернуть приложение
1. Склонировать проект, переключить из ветки v3
2. Удаляем git  ```sudo rm -rf .git```
6. Собрать контейнеры <br>```docker-compose build```
7. Поднять контейнеры  <br>```docker-compose up -d```
8. Установить зависимости композер ```docker-compose run --rm -u root app composer i```
9. Выполнить миграции ```docker-compose run --rm app php artisan migrate```
