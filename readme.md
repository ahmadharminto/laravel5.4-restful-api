<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## How To

- Setup the database connection in .env file from .env.example
- Do not forget to set APP_KEY inside .env file : php artisan key:generate
- Run : php artisan config:cache
- Run : composer install
- Run : php artisan migrate --seed
- Run : php artisan passport:install
- Run : npm install
- npm run watch

List url for token management :
- base_url/home
- base_url/oauth/authorize?client_id={}&redirect_uri={}&response_type=code
- base_url/oauth/authorize?client_id={}&redirect_uri={}&response_type=token

For create new client (client_credentials grant-type) : php artisan passport:client

For create new client (password grant-type) : php artisan passport:client --password

For create new client (personal) : php artisan passport:client --personal

For publish passport components (vue) : php artisan vendor:publish --tag=passport-components
