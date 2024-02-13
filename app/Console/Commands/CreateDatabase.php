<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una base de datos si no existe';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databaseName = env('DB_DATABASE');
        $charset = Config::get('database.connections.mysql.charset', 'utf8');
        $collation = Config::get('database.connections.mysql.collation', 'utf8_general_ci');

        // Cambia la configuración de la base de datos a una base de datos que exista
        Config::set('database.connections.mysql.database', null);

        $databases = DB::select('SHOW DATABASES');

        $exists = false;
        foreach ($databases as $database) {
            if ($database->Database == $databaseName) {
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            try {
                DB::statement("CREATE DATABASE {$databaseName} CHARACTER SET {$charset} COLLATE {$collation};");
                $this->info("La base de datos {$databaseName} ha sido creada.");
            } catch (QueryException $ex) {
                $this->info("La base de datos {$databaseName} no pudo ser creada, pero el proceso continuará.");
            }
        } else {
            $this->info("La base de datos {$databaseName} ya existe.");
        }

        // Cambia la configuración de la base de datos a la nueva base de datos
        Config::set('database.connections.mysql.database', $databaseName);

        // Reconecta la base de datos
        DB::purge('mysql');
        DB::reconnect('mysql');

        // Obtén la lista de migraciones
        $migrator = app('migrator');
        $migrationFiles = $migrator->getMigrationFiles(database_path('migrations'));

        // Ejecuta cada migración individualmente
        foreach ($migrationFiles as $migrationFile) {
            $migrationName = $migrator->getMigrationName($migrationFile);

            // Extrae el nombre de la tabla del nombre de la migración
            $tableName = explode('_', $migrationName)[1];

            if (!Schema::hasTable($tableName)) {
                try {
                    $migrator->runPending([$migrationFile], []);
                } catch (QueryException $ex) {
                    $this->info("La migración {$migrationName} falló, pero el proceso continuará. Motivo: {$ex->getMessage()}/n");
                    $this->newLine();
                }
            }
        }
    }
}
