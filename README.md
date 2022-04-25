# laravue
A fullstack project made with Laravel and Vue
<br><br>

<strong>Requirements:</strong>
- PHP 8.1
- MariaDB 10
- Composer
- npm
<br><br>

<strong>In the backend directory:</strong>
- Create a new database in your MariaDB connection (name: laravue, charset: utf8mb4, collation: utf8mb4_unicode_ci)
- run ```composer install```
- run ```cp .env.example .env```
- Set the database connection variables
- run ```php artisan migrate```
- run ```php -S localhost:9000 -t public```
<br><br>

<strong>In the frontend directory:</strong>
- run ```npm install```
- run ```npm run serve```