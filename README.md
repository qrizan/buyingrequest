# Buying Request

- PHP (Laravel 5.2)
- LAMP 

```sh
rename evn.example .env
setup .env
MAIL_DRIVER=log
php artisan migrate:refresh --seed
php artisan serve

http://localhost:8000
```


```sh
check email : storage/logs/laravel.log
unit test : ./vendor/bin/phpunit
```
