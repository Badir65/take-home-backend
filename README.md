## Laravel Environment DB Informations

You can change from .env file for your MySQL 

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=MySQL80
DB_USERNAME=root
DB_PASSWORD=mysql14

## Install composer packages

'composer install'

This command will install the required packages by resolving the dependencies in project's composer.json file.

## Run Schedule Function For News Data

You have to manually run 'php artisan fetch:news' command for get news datas from newsapi.org
and save to database

## Run Migration Command

'php artisan migrate'

## Start Project Command

'php artisan serve --port=8080'
