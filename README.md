# Products CRUD application with Laravel (Authentification, products CRUD, user activity tracking and REST API endpoint to get latest user activity)

## Project setup
1. Go to root directory
2. Run `composer install`
3. Configure your database connection in .env file
4. Run `php artisan migrate`
5. Launch on local php dev server with `php artisan serve`


### API endpoint

API endpoint to get user acitivity is `/api/activity`.
Response is limited to 10 data points
