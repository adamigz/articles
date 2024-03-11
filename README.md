# Articles
---
### Requirements
- PHP (8.1 - 8.3)
- MySQL
- Composer
- npm

### Instalation
1. Clone GitHub repository
```
git clone https://github.com/adamigz/articles.git
```
2. Install laravel dependencies
```
composer install
```
3. Copy .env.example to .env
```
cp .env.example .env
```
4. Edit this data in .env file
>DB_CONNECTION=mysql
>DB_HOST=127.0.0.1
>DB_PORT=3306
>DB_DATABASE=articles
>DB_USERNAME=root
>DB_PASSWORD=
5. Generate app key
```
php artisan key:generate
```
6. Run migrations
```
php artisan migrate
```
7. Run seeders (to insert somen authors in to the database)
```
php artisan db:seed
```
8. Install js libraries
```
npm install
```
9. Build js files
```
npm run dev
```
10. Run app in local environment
```
php artisan serve
```
