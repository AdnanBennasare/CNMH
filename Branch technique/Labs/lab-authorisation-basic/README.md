# Lab authorisation basic

## Travail à faire

- Ajouter l'authentification pour `Lab-Laravel-crud-basic` 
- Additionner l'autorisation pour `Lab-Laravel-crud-basic`
### Critères de validation

- Intégrer l'authentification via Laravel Auth.
- Appliquer la fonction callAction.
- Utiliser Gate pour les autorisations.
- Éviter l'utilisation des policies

#### Référence
- [Authentififcation](https://laravel.com/docs/10.x/authentication)
- [authorization](https://laravel.com/docs/10.x/authorization)


##### Command used in the application

. aprés avoire clonne le dipot lab-crud-basic

1. Update Composer Dependencies:

```bash
composer update 
```

2. Create Environment File:

```bash
cp .env.example .env
```

3. Run Migrations:

```bash
php artisan migrate
```

4. Seed Database:

```bash
php artisan db:seed
```

5. Launch the Application::

```bash 
php artisan serve
```


5. Launch the Application::

```bash 
php artisan serve
```
6. AppBaseController::

```bash 
php artisan make:controller AppBaseController
```

7. cree seeders pour user::

```bash 
php artisan make:seeder UserSeeder
```


