# Lab-laravel-basic

## travail a faire

1. Créer le CRUD des tâches
2. Inclure la recherche en utilisant AJAX
3. Ajouter la pagination
4. Ajouter la base de données incluant la table des projets dans les seeders


## how to create development envirement

1. Start by installing Laravel through the terminal with this command:

```
composer create-project laravel/laravel lab-laravel-basic
```

2. Next, create the .env file using the command:
```
cp .env.example .env
```
3. Add the database name to the .env file.

4. Proceed to create the tables by running these commands:
```

php artisan make:migration Projects

php artisan make:migration Tasks

```
5. Once the column names for the tables are set, migrate them to the database:
```
php artisan migrate
```

6. Populate the database with project information by creating a seeder and executing:
```
php artisan db:seed

```

7. With the tasks table and seeder set, generate models for `tasks` and `projects`:

```
php artisan make:model Project

php artisan make:model Task
```
8. Create controllers to manage data from the database:
```
php artisan make:controller ProjectsController 

php artisan make:controller TasksController 

```
9. To view your project's progress locally, run this command:
```
php artisan serve

```