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

Run all Mix tasks and minify output...

    npm run production


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


#Testing

Run test unit:

    vendor/bin/phpunit tests/Feature/AppTest

# Todo Workflow

1. **Backend**

   * Create Models
   * I should be able to add a new user from the command line.
   * I should be able to change a user password from the command line.
   * I should be able to seed fake data (10000 items / 100 users) from the command line.
   
3. **UI**

   * As a user, I can register by providing simply an email and a password.
   * As a logged user, I can add items. An item is a title, image and description.

4. **Testing**

   * Write some unit tests
   
5. List all items with infinite scroll pagination using a VueJs Component.