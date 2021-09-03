# webprogramming-2021
Rebuni online education platform (ROEP) is a web based system which aim to connect colleges, teachers and students in one organized platform.

## Requirements 
* `PHP7.4`
* `Composer 1.10.1 2020-03-13 20:34:27`
* `git 2.25.1`

## Steps
* `git clone git@github.com:RebuniTech/webprogramming-2021.git`
* cd into `webprogramming-2021`
* `composer update`
* create `.env` file
* `add database configuration in .env as written in .env.example`
* `php7.4 migrate.php`
* cd into `public` directory
* `php7.4 -S localhost:8000`
