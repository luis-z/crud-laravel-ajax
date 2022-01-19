# Gestión de Estudiantes en Laravel 8 y AJAX
CRUD de estudiantes con paginación utilizando la autenticación de Laravel 8 con AJAX y Bootstrap.
## Proceso de Instalación:
### Configurar conexión a la base de datos en el .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=colegio
DB_USERNAME=root
DB_PASSWORD=
```
### Instalar paquetes:
Abrir una consola  o terminal y ubicarse en la raíz del proyecto, luego ejecutar los siguientes comandos uno por uno:
```
composer install
npm install
npm run dev
```
### Migración y Seed de datos
```
php artisan migrate
php artisan db:seed
```
### Iniciar el servidor
```
php artisan serve
```
Ahora procede a abrir el navegador en la siguiente ruta: 
```
https://localhost:8000/