# Wave

Descripción del proyecto.


>[!WARNING]
>Recuerda utilizar en el middleware de [routes/api.php](routes/api.php) siempre jwt:auth para requerir siempre un token de Autenticacio y tener más seguridad; para que nuestra api no responda a cualquier petición sospechosa


## Comandos

Aquí están los comandos más importantes que puedes necesitar para trabajar con este proyecto:

-   `php artisan app:create-database`: Crea la base de datos necesaria para el backend, y la vez migra todas las bases de datos ubicados en [database/migrations](database/migrations/).
-   `php artisan serve`: Inicializa el servidor de laravel.
-   `php artisan make:model`: Este comando crea un nuevo modelo en Laravel. Si añades la opción `-c` al final, también se creará un controlador para ese modelo. Por ejemplo, `php artisan make:model User -c` creará tanto el modelo `User` como un controlador para `User`. Si deseas organizar tus modelos en subcarpetas, puedes especificar la subcarpeta al crear el modelo. Sin embargo, ten en cuenta que el controlador no se colocará en la misma subcarpeta. Por ejemplo, `php artisan make:model Admin/User` creará el modelo `User` en la subcarpeta `Admin`, pero el controlador `UserController` se creará en la carpeta de controladores principal.

-   `php artisan make:controller`: Este comando crea un nuevo controlador en Laravel. Si añades la opción `-m` seguida del nombre de un modelo, el controlador se creará con un conjunto de métodos predefinidos para un recurso, asumiendo que el controlador interactuará con el modelo especificado. Por ejemplo, `php artisan make:controller UserController -m User` creará un controlador `UserController` con métodos para crear, leer, actualizar y eliminar instancias del modelo `User`. Además, este comando también generará un modelo `User` si no existe ya. Si deseas organizar tus controladores en subcarpetas, puedes especificar la subcarpeta al crear el controlador. Sin embargo, ten en cuenta que el modelo no se colocará en la misma subcarpeta. Por ejemplo, `php artisan make:controller Admin/UserController -m User` creará el controlador `UserController` en la subcarpeta `Admin`, pero el modelo `User` se creará en la carpeta de modelos principal.



## Contribuidores

<ul>
    <li>
        <a href="https://github.com/angelitojpcm">
            <img src="https://avatars.githubusercontent.com/u/150268753?s=100&u=6ed1f6e87db40bd7c6f7a89d6b675e96fad5f4e7&v=4" alt="Angel Calderon Mantilla" width="100" height="100">
            Angel Calderon Mantilla
        </a>
    </li>
    <li>
        <a href="https://github.com/David182003/">
            <img src="https://avatars.githubusercontent.com/u/108392777?s=100&v=4" alt="David Miñano Moreno" width="100" height="100">
            David Miñano Moreno
        </a>
    </li>
</ul>


Este proyecto está licenciado bajo la licencia [Nombre de la licencia](URL a la licencia).
