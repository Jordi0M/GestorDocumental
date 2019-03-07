# Proyecto 3: Gestor Documental

## Contenidos
1. [Desarrolladores](#desarrolladores)
2. [Contenido](#contenido)
3. [Requisitos](#requisitos)

## Desarrolladores <a name="desarrolladores"></a>
- Jesus Soto (Xus) - https://github.com/Xusbcn
- Jordi Martínez - https://github.com/Jordi0M

## Contenido
Todo el contenido del javascript, css e imagenes, se encuentra en la carpeta "public".

Todas las rutas externas, las podremos ver en la vista "master" (/resources/views/layouts/master.blade.php).

El resto del contenido se encontra en las demas vistas (/resources/views/.)

## Requisitos: <a name="requisitos"></a>
Para poder ejecutar la aplicacion, necesitaremos tener instalado un servidor **mysql**, **composer** y **laravel**.

Una vez lo tengamos todo instalado, crearemos la base de datos.

Al tener ya la base de datos, tendremos que hacer dentro de la carpeta un **composer install**, copiaremos el ".env.example" y crearemos ".env" donde pegaremos el contenido, cambiando el nombre de la base de datos, el usuario y la contraseña.

Procederemos a hacer el comando "php artisan key:generate".

Haremos la migracion de la base de datos con "php artisan migrate".

Para finalizar, ejecutaremos el comando "php artisan serve", y ya podremos ver la aplicacion.