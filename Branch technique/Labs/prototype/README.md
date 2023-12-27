composer create-project laravel/laravel .
php artisan serve
composer require infyomlabs/laravel-ui-adminlte
php artisan ui adminlte --auth
npm install 
npm run dev
php artisan make:controller ProjectController
php artisan make:migration create_project_table
php artisan make:migration create_tasks_table 
php artisan make:model Project 
php artisan make:controller TasksController
php artisan make:model Tasks 
composer require maatwebsite/excel:^3.1
php artisan make:export ProjectExport --model=Project
php artisan make:import ProjectImport 

php artisan make:export TaskExport --model=Task
php artisan make:import TaskImport 

php artisan make:export MemberExport --model=User
php artisan make:import MemberImport 

php artisan make:middleware Localization
php artisan make:controller LocalizationController

composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
