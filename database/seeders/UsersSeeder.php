<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['full_name' => 'admin', 'email' => 'angelitojpcmantilla22@gmail.com', 'rol_id' => 1, 'password' => bcrypt('admin'), 'state' => 1, 'last_device' => null],
            ['full_name' => 'demo', 'email' => 'demo@wave.com', 'rol_id' => 3, 'password' => bcrypt('demo'), 'state' => 1, 'last_device' => null]
        ]);
    }
}
