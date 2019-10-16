composer create-project --prefer-dist laravel/laravel blog "5.8.*"

sudo chmod -R 777 storage/logs
sudo chmod -R 777 storage/frameworks
sudo chmod -R 777 bootstrap/cache

###### Create DB
# demo_sistemadecomentarios

###### Install Font Awesome
#npm install font-awesome

# resources/assets/sass/app.scss 
# Font Awesome 
# @import "node_modules/font-awesome/scss/font-awesome";
# copy fonts to public

###### Config file .env in folder data
# database | name

##### Install Node
# npm install node
# npm run watch

###### Show Commands
php artisan

##### Create Default Auth / Users
php artisan make:auth

##### Create Model
php artisan make:model Users --resource
php artisan make:model Comments --resource

##### Create Database / Config Data
php artisan make:migration create_users_table --create=users
php artisan make:migration create_comments_table --create=comments
#php artisan make:migration create_comments_table --table=comments

##### Create Factory / Config Data
php artisan make:factory UsersFactory
php artisan make:factory CommentsFactory

##### Create Seeder / Config Data
php artisan make:seeder UsersTableSeeder
php artisan make:seeder CommentsTableSeeder

##### Create Populate
php artisan migrate
php artisan migrate:refresh
php artisan migrate:reset

php artisan db:seed

#### Configure Controllers
#php artisan make:controller Comments/Comments --invokable
#index | create | store | show | edit | update | destroy

#### Configure Routes

#### Create Template

#### Permissoes de acesso
#https://www.youtube.com/watch?v=FNu3gEd5z5Y

#### Validations

php artisan storage:link
composer require intervention/image