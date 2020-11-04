# library-symfony
Требования:
Symfony >= 5.0
PHP >= 7.4
MySQL 5.7
Composer >= 2.0

Установка:
1) Скачиваем или клонируем проект
2) В файле .env редактируем строку 'DATABASE_URL=mysql://mysql:mysql@127.0.0.1:3306/library?serverVersion=5.7', где 'mysql://Пользователь:Пароль@Сервер/Название базы данных'
3) Открываем консоль (Если не открыта)
4) Прописивыем путь к проекту 
5) Выполняем команду 
composer install
6) Выполняем команду для создания бд 
php bin/console doctrine:database:create
7) Выполняем команду для создания таблиц и т.д 
php bin/console doctrine:migrations:migrate
8) Запускаем сервер командой 
symfony server:start
9) В браузере открываем сайт по адресу 127.0.0.1:8000
