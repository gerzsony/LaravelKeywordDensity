composer create-project --prefer-dist laravel/laravel LaravelKeywordDensity

cd LaravelKeywordDensity 

sudo chmod -R 777 storage/*

########

git init
git add .
git commit -m 'init'
git remote add origin https://github.com/gerzsony/LaravelKeywordDensity
git push -u -f origin master

#########

php artisan make:controller ToolController

touch "resources/views/index.blade.php"
md "resources/views/layouts"
touch "resources/views/layouts/master.blade.php"

#routes/web.php

composer require html2text/html2text
composer install
composer update

#if you some classes not autoloaded check out the name in vendor/composer/autoload_static.php




