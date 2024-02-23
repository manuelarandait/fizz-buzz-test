
# Fizz Buzz
## Tecnologías utilizadas: 

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

## Para levantar el proyecto, basta con seguir estos pequeños pasos: 
```bash
# Crea los contenedores de PHP y la base de datos en Mysql
make build

# Los inicia
make start

# Ejecuta composer install
make prepare

# Creación de la base de datos
make create-database

# Si al ejecutar el create-database, aparece un error de que la base de datos ya está creada, pasamos directamente a la siguiente instrucción:
make migrate
 ```


Con estos pasos tenemos nuestros contenedores creados y levantados, ejecutado el composer install,
y la base de datos preparada para empezar a trabajar.

## Para levantar el server de development de Symfony:
```bash
# Inicializa el server de desarrollo de symfony en http://127.0.0.1:8000/
make run
```

### Para analizar el código, podemos ejecutar un pequeño análisis del codigo ejecutando:
```bash
make analyse
```
 
## Testing:
```bash
# Ejecución de los test
make create-database-test
make test
```

### Como extra, se ha instalado la librería de [API platform](https://api-platform.com/). Es una herramienta muy potente que te permite crear endpoints directamente a traves de tus entidades:
```bash
# se puede acceder a la documentacion de Swagger en la ruta
http://127.0.0.1:8000/api
```

