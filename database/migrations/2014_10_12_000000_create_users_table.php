<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->string('password');
            $table->string('photo')->default('default.jpg');
            $table->unsignedBigInteger('last_device');
            $table->foreign('last_device')->references('id')->on('devices');
            $table->boolean('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['full_name' => 'admin', 'email' => 'angelitojpcmantilla22@gmail.com', 'rol_id' => 1, 'password' => bcrypt('admin'), 'state'=> 1],
            ['full_name' => 'demo', 'email' => 'demo@wave.com', 'rol_id' => 3, 'password' => bcrypt('demo'), 'state'=> 1]
        ]);
    }
};
