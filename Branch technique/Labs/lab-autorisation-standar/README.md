# Lab authorisation standard

## Travail à faire
- Donner les roles et permissions pour chaque utilisateur


### Critères de validation

- Attribution d'un rôle et de permissions à chaque utilisateur.
- Utiliser package spatie laravel permission
- Utiliser un seeder pour ajouter les rôles et les permissions

#### Référence

- [authorization](https://hotexamples.com/examples/illuminate.routing/Controller/callAction/php-controller-callaction-method-examples.html)
- [authorization](https://spatie.be/docs/laravel-permission/v6/introduction)

##### Command used in the application



1. Update Composer Dependencies:

```bash
composer install 
```

2. Create Environment File:

```bash
cp .env.example .env
```

3. Run Migrations:

```bash
php artisan migrate
```
4. 
```bash
composer require infyomlabs/laravel-ui-adminlte
```
5. 
 ```bash
 php artisan ui adminlte --auth
 ```

6. download spatie package
 ```bash
 composer require spatie/laravel-permission
 ```

7. 
```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```


8. Seed Database:

```bash
php artisan db:seed
```

9. Launch the Application::

```bash 
php artisan serve
```


10. AppBaseController::

```bash 
php artisan make:controller AppBaseController
```

11. cree seeders pour user:

```bash 
php artisan make:seeder UserSeeder
```

12. cree seeders pour Permission:

```bash 
php artisan make:seeder PermissionSeeder
```

13. cree seeders pour role:

```bash 
php artisan make:seeder RoleSeeder
```

14. cree seeders pour project:

```bash 
php artisan make:seeder ProjectSeeder
```

