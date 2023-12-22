# Installation d'un serveur Web Apache/PHP/MySQL

## travail a faire

1. Installation de Apache comme service Windows
2. Installation de PHP
3. Configuration de PHP comme module Apache
4. Install https
     - OpenSSL



## Critère de validation 

1. Déploiement de lab-laravel-crud-basic sans VirtuelHost
   - Fichier de configuration apache par défaut
   - Fichier de configuration apache
   - Référence
2. Déploiement de lab-laravel-crud-standard dans le même serveur
   -  Fichier de configuration apache
   -  Référence
3. Installation de HTTPS sur lab-laravel-crud-basic
   - Commandes
   - Référence

## Commandes





```
PHPIniDir "C:/php"
LoadModule php_module "C:/php/php8apache2_4.dll"
AddType application/x-httpd-php .php
ServerName localhost
```

test les modification 
```
cd /Apache24/bin
httpd -t
```



install Apache as a Windows service
```
httpd -k install
```



reference
