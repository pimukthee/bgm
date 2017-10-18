<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


## installation

1. Install dependencies

```
php composer.phar install
```

2. Create a config file, copy from `.env.example` then rename it to `.env`
   config your database username and password
3 generate app key
```
php artisan key:generate
```

4. Create a database named `bgm`

5. Migrate and seed the database

```
php artisan migrate
```

## Running on your local machine

```
php -S localhost:8000 -t public
```