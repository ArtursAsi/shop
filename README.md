### Instructions:
Clone project

>git clone https://github.com/ArtursAsi/shop

Install Composer
>composer install

Install npm
>npm install

Create environment file
>cp .env.example .env

Link storage
>php artisan storage:link
>

Create Database with 2 tables

>'products' with 4 columns
>>'name','image','description','price'

>'orders' with 2 columns
>>'user_id','cart'

Migrate Database
>php artisan migrate

Run app
>php artisan serve


### Description

This app is like internet shop.Just register.
Add products.
Add them to cart, then checkout with an option to choose where to ship.
After the checkout You can view Your orders. 




