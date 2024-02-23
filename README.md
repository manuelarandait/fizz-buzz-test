
><h1>Fizz Buzz</h1>
<h2> Tecnologías utilizadas: </h2>

<ol>
    <li>Symfony 6.4</li>
    <li>Twig / Bootstrap (CDN)</li>
    <li>Docker 25.0.2 
        <ol>
            <li>php:8.2-fpm-alpine</li>
            <li>MySql Latest</li>
            <li>Composer</li>
        </ol>
    </li>
    <li>PhpStorm 2023.3.4</li>
    <li>Github / Actions</li>
    <li>Make</li>
</ol>

<h3>Para levantar el proyecto, basta con seguir estos pequeños pasos: </h3>
> ### `make build`
> ### `make start`
> ### `make prepare`
> ### `make create-database`
> Si al ejecutar el create-database, aparece un error de que la base de datos ya está creada, pasamos directamente a la siguiente instrucción:
> ### `make migrate`

Con estos pasos tenemos nuestros contenedores creados y levantados, ejecutado el composer install,
y la base de datos preparada para empezar a trabajar.

<h3>Para levantar el server de development de Symfony: </h3>
> ### `make run`
> 
> Como extra, podemos ejecutar un pequeño análisis del codigo ejecutando:  </h3>
> ### `make analyse`
 
<h3>Testing: </h3>
> ### `make test`

