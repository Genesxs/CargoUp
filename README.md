### Commands to start to work

1. Crear la base de datos.
2. Clonar el archivo .env.example y eliminar la extension .example
3. Del archivo .env Escribir los datos solicitados en la líneas:
 * Database
 * Access : pasar a false la autenticación de dos factores.

Una vez hecho estos pasos hacer los siguientes comando con tu terminal git bash, cmd o la terminal visual.

1. **composer install**
2. **npm install**
3. **php artisan migrate**
4. **php artisan db:seed**
5. **php artisan key:generate**
6. **npm run dev**
7. **php artisan storage:link**

## Nota:1

Ya que el proyecto tiene implementado en composer el **sweetAlert** escribir los siguientes comandos:

1. **composer require realrashid/sweet-alert**
2. **composer update**
3. **php artisan sweetalert:publish**

## Nota:2

En la carpeta **storage/app** crear una carpeta con nombre documents y agregar los siguientes documentos.

https://drive.google.com/drive/folders/1itfoMkqvV7lPJiZxgqXc45rv-9gc1yb1?usp=sharing

### Cuentas creadas por el seeder

**Admin:** admin@cargoup.com  
**Password:** a1b2c3

**User:** user@cargoup.com  
**Password:** a1b2c3


### Introduction

Laravel Boilerplate provides you with a massive head start on any size web application. Out of the box it has features like a backend built on CoreUI with Spatie/Permission authorization. It has a frontend scaffold built on Bootstrap 4. Other features such as Two Factor Authentication, User/Role management, searchable/sortable tables built on my [Laravel Livewire tables plugin](https://github.com/rappasoft/laravel-livewire-tables), user impersonation, timezone support, multi-lingual support with 20+ built in languages, demo mode, and much more.

