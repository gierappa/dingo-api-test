# Installation
Step 1: Get the code

Step 2: Use Composer to install dependencies
```sh
$ cd /path/to/project
$ composer install
```
Step 3: Perform default commands for new projects
```sh
$ php -r "copy('.env.example', '.env');"
$ php artisan key:generate
```
Step 4: Configure your database
Check Laravel's Documentation for setting up the database configuration

Step 5: Use PHP's built-in development server or use yours
```sh
$ php artisan serve
```

Step 6: Migrate new tables to database
```sh
$ php artisan migrate
```

Step 7: Test API endpoints 
```sh
$ php artisan serve
```

Additionally test api endpoints
```sh
$ php vendor/bin/codecept run api
```