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

Procederemos a hacer el comando *"php artisan key:generate"*.

Haremos la migracion de la base de datos con *"php artisan migrate"*.
(En caso de que ya tuviesemos una migracion hecha, podemos usar el comando "php artisan migrate:refresh" para borrar las tablas de la base de datos, y que nos la vuelva a crear. **Borrara toda la informacion que tengamos en la base de datos**)

Para añadir informacion a la base de datos, tendremos el seeder. Tenemos que hacer dos comandos:
*"composer dump-autoload -o"* y *"php artisan db:seed --class=ClienteSeeder"*.
Asi ya tendremos la informacion generada en la base de datos.

Para que se guarde bien el contenido de los documentos, debemos hacer el siguiente comando:
*"php artisan storage:link"*, esto creara un link a la carpeta storage para poder guardar en local los ficheros y luego poder mostrarlos linkandolos a la base de datos.


Para finalizar, ejecutaremos el comando *"php artisan serve"*, y ya podremos ver la aplicacion.
