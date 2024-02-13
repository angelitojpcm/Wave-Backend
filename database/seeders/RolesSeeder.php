<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'description' => 'Administrador con todos los permisos'],
            ['name' => 'editor', 'description' => 'Editor con permisos para crear y editar contenido'],
            ['demo' => 'demo', 'description' => 'Usuario de demostración con permisos limitados']
        ]);
    }
}
