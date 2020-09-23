# pokemon
laravel app with the https://pokemontcg.io/ api

### Local Environment Setup (Configuration de l'environnement local)

All shell commands require current folder to be project root.

- clone the repository
```
git clone https://github.com/bellatez/pokemon.git
```

- Switch to the api directory
```
cd pokemon

```
- Run the following commands

    -If you do not have composer: 
    
- Install Composer (http://getcomposer.org) and run
```
composer install
```
if composer is installed globally, or
```
php composer.phar update
```
if you simply downloaded composer.phar into project root.

- Copy `.env.example` to `.env` and configure `.env` (`APP_URL`, `DB_*` settings).

- Generate app key
```
php artisan key:generate
```

- Start your server with the command
```
php artisan serve
```
