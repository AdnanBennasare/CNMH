# lab-authentification

## Travail à faire

- Ajouter l'authentification pour lab crud basic
- Intégrer l'authentification via Laravel Auth.

### refrence laravel.com:

[laravel.com](https://laravel.com/docs/10.x/authentication)


## Command used in the application
- après avoir cloné le dépôt
1. Update Composer Dependencies:
```
composer update 

```
2. Create Environment File:
```
cp .env.example .env
```

3. Run Migrations:
```
php artisan migrate

```

6. Seed Database:
```
php artisan db:seed
```

7. create user controller
```
php artisan make:controller UserController
```
8. Launch the Application::
```
php artisan serve
```