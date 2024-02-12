# Nombre del Proyecto

Descripción del proyecto.

## Comandos

Aquí están los comandos más importantes que puedes necesitar para trabajar con este proyecto:

-   `php artisan app:create-database`: Crea la base de datos necesaria para el backend.
-   `php artisan migration`: Migra todas las tablas de [database/migrations](database/migrations/).
-   `php artisan serve`: Inicializa el servidor de laravel.
-   `php artisan make:model`: Este comando crea un nuevo modelo en Laravel. Si añades la opción `-c` al final, también se creará un controlador para ese modelo. Por ejemplo, `php artisan make:model User -c` creará tanto el modelo `User` como un controlador para `User`. Si deseas organizar tus modelos en subcarpetas, puedes especificar la subcarpeta al crear el modelo. Sin embargo, ten en cuenta que el controlador no se colocará en la misma subcarpeta. Por ejemplo, `php artisan make:model Admin/User` creará el modelo `User` en la subcarpeta `Admin`, pero el controlador `UserController` se creará en la carpeta de controladores principal.

`php artisan make:controller`: Este comando crea un nuevo controlador en Laravel. Si añades la opción `-m` seguida del nombre de un modelo, el controlador se creará con un conjunto de métodos predefinidos para un recurso, asumiendo que el controlador interactuará con el modelo especificado. Por ejemplo, `php artisan make:controller UserController -m User` creará un controlador `UserController` con métodos para crear, leer, actualizar y eliminar instancias del modelo `User`. Además, este comando también generará un modelo `User` si no existe ya. Si deseas organizar tus controladores en subcarpetas, puedes especificar la subcarpeta al crear el controlador. Sin embargo, ten en cuenta que el modelo no se colocará en la misma subcarpeta. Por ejemplo, `php artisan make:controller Admin/UserController -m User` creará el controlador `UserController` en la subcarpeta `Admin`, pero el modelo `User` se creará en la carpeta de modelos principal.


## Contribuidores

-   [Contribuidor 1](https://github.com/contribuidor1)
-   [Contribuidor 2](https://github.com/contribuidor2)
-   [Contribuidor 3](https://github.com/contribuidor3)

## Licencia

Este proyecto está licenciado bajo la licencia [Nombre de la licencia](URL a la licencia).
