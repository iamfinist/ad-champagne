1) Клонировать репозиторий https://github.com/iamfinist/ad-champagne
2) Запустить докер, docker-compose up -d
3) Создать бд ad_champagne в phpMyAdmin (127.0.0.1:10090)
4) docker exec test-php composer update
5) docker exec -it test-php php yii migrate

Приложение доступно по адресу 127.0.0.1:10075

