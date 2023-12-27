# CNMH Prototype

## Travaille à faire
Créez une application web avec Laravel dédiée à la gestion de projets et de tâches, intégrant le package Maatwebsite Excel pour une exportation et une importation de données efficaces. L'application est construite avec une authentification utilisateur Laravel UI et intègre AdminLTE pour l'interface utilisateur. Les permissions utilisateur sont gérées via Spatie Laravel Permission, et les fonctionnalités incluent la recherche, la pagination et le filtrage. De plus, des tests unitaires ont été mis en place pour les contrôleurs de projets et de tâches.

## Prerequisites
- PHP 8.2
- Composer
- Node.js & NPM
- MySQL

## les comandes
```
composer create-project laravel/laravel .
```
```
php artisan serve
```

```
composer require infyomlabs/laravel-ui-adminlte

```

```
php artisan ui adminlte --auth

```
```
npm install 
npm run dev

```
```
php artisan make:controller ProjectController
php artisan make:controller TasksController
php artisan make:controller UserController

```
```
php artisan make:model Project 
php artisan make:model Tasks 
```
```
php artisan make:migration create_project_table
php artisan make:migration create_tasks_table 
php artisan migrate

```
```
composer require maatwebsite/excel:^3.1

php artisan make:export ProjectExport --model=Project
php artisan make:import ProjectImport 
php artisan make:export TaskExport --model=Task
php artisan make:import TaskImport 
php artisan make:export MemberExport --model=User
php artisan make:import MemberImport 

```
```
php artisan make:middleware Localization
php artisan make:controller LocalizationController

```
```
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate:fresh --seed
```









