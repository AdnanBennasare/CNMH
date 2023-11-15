
## Laravel Project Task Member App

In this project I went on doing a laravel web application that enables me to manage mambers, projects, Tasks  

## to run this project first 
**clone the repository** 
```
git clone https://github.com/AdnanBennasare/CNMH
```
**navigate to the the-project-task-prototype directory and run composer install** 
```
composer install
```

in this project i'm using laravel app i using execl export import method from a well known laravel-execl library

🚀 Laravel Excel is intended at being Laravel-flavoured PhpSpreadsheet: a simple, but elegant wrapper around PhpSpreadsheet with the goal of simplifying exports and imports.

🔥 PhpSpreadsheet is a library written in pure PHP and providing a set of classes that allow you to read from and to write to different spreadsheet file formats, like Excel and LibreOffice Calc.

**after setting your your project** 

1. Go to composer.json
2. Update "maatwebsite/excel": "3.1.48",
3. Run composer update
4. Go to config->app.php
5. Add to providers Maatwebsite\Excel\ExcelServiceProvider::class,
6. Add to aliases 'Excel' =>Maatwebsite\Excel\Facades\Excel::class,
7. php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config

