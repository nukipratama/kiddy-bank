# Welcome to KiddyBank!

## Deploying and Running Project

1. Install composer packages and dependencies
> composer install
2. Database Migration ( please make sure, database 'kiddy-bank' is exist )
> php artisan migrate:fresh
3. Database Seeder
>php artisan db:seed
4. Running
>php artisan serve