# I Can vue Infinite items

Simple Vuejs and laravel Infinite Items Application

# Requirements 

* PHP >= 7.1.3
* Mysql

# Installation

Clone the repository:

    git clone https://github.com/Qoraiche/can-vue-items-laravel-challenge.git

Install application dependencies and optimize class autoloader map:

    composer install --optimize-autoloader --no-dev

Create configuration file:

    cp .env.example .env
    
Generate key:

    php artisan key:generate

Install the Javascript dependencies using NPM:

    npm install


In the `.env`, fill in your database details:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[YOUR_DB_NAME]
    DB_USERNAME=[YOUR_DB_USERNAME]
    DB_PASSWORD=[YOUR_DB_PASSWORD]
    
Run database migrations

    php artisan migrate

Seed database

    php artisan db:seed