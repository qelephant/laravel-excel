## Установка

- git clone https://github.com/qelephant/laravel-excel
- php artisan key:generate
- php artisan migrate
- composer update
- php artisan serve

## О проекте

Реализовано 
 - импорт xlx, .xls файлов (библиотека maatwebsite/excel)
 - сортировка и пагинация таблиц (библиотека kyslik/column-sortable)

 Импорт производится по пути "/", после успешной валидации, на главной странице выводиться импортированные данные с файла
 Просмотр определенной строки в "view/{id}" 
