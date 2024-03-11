# Articles
---
### Requirements
- PHP (8.1 - 8.3)
- MySQL
- Composer
- npm
---
### <span style="color: red;">In case you don't want to install this app localy, it's available at <[articles.pitrowski.pl](https://articles.pitrowski.pl)></span>
---
### Instalation
1. Clone GitHub repository
```
git clone https://github.com/adamigz/articles.git
```
2. Install laravel dependencies
```
composer install
```
In case of errors run
```
composer update
```
3. Copy .env.example to .env
```
cp .env.example .env
```
4. Edit this data in .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=articles
DB_USERNAME=root
DB_PASSWORD=
```
5. Generate app key
```
php artisan key:generate
```
6. Run migrations
```
php artisan migrate
```
7. Run seeders (to insert some authors in to the database)
```
php artisan db:seed
```
8. Install js libraries
```
npm install
```
9. Build js files
```
npm run build
```
10. Run app in local environment
```
php artisan serve
```
---
### Usage
1. Home page
Shows last 10 articles added to the database. Click article title to redirect to article page. Click author name to redirect to author page.

2. Articles
Shows all articles (no pagination). You can add new article by clicking blue button Create, and delete every article with red button Delete. By clicking the article title you will be redirected to the article page. You can there edit article by clicking blue button Update and also go to author/s page by clicking name at bottom right corner of article.

3. Authors
Shows all authors (no pagination). You can add new author by clicking blue button Create, and delete every author with red button Delete. By clicking the author name you will be redirected to the author page. There will be shown all authors articles (also can click the title of every to redirect to article page). You can there edit author by clicking blue button Update. After installation there will be 10 randomly generated authors (step 7.)

### API
|Endpoint|Params|Description|Response type|
|--------|------|-----------|-------------|
|`/getArticle/{id}`|id - (int) id of article from database|Returns the article with author/s for given id|`application/json`|
|`/getAllArticlesForAuthor/{fullname_slug}`|fullname_slug - (string) authors fullname slug "name-surname"|Returns all authors articles|`application/json`|
|`/getTopAuthors`|<no params>|Return top 3 authors based on written articles amount from last week|`application/json`|

### SQL.sql file
I also included the .sql file to import if somehow Laravel migrations won't work. It has all the tables and and data as the live version [articles.pitrowski.pl](https://articles.pitrowski.pl)
