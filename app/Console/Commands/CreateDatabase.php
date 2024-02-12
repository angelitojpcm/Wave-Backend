<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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

        if (!Schema::hasTable($databaseName)) {
            DB::statement("CREATE DATABASE {$databaseName} CHARACTER SET {$charset} COLLATE {$collation};");
            $this->info("La base de datos {$databaseName} ha sido creada.");

            // Cambia la configuración de la base de datos a la nueva base de datos
            Config::set('database.connections.mysql.database', $databaseName);
        } else {
            $this->info("La base de datos {$databaseName} ya existe.");
        }
    }
}
