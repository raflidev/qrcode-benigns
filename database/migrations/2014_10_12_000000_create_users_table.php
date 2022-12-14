<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('outlet');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => "Bening's",
            'username' => 'bening2022',
            'password' => bcrypt('adminbening2022'),
            'outlet' => 'Bandung',
            'role' => 'superadmin',
        ]);
        DB::table('users')->insert([
            'name' => "Rafli Ramadhan",
            'username' => 'test',
            'password' => bcrypt('test'),
            'outlet' => "Bandung",
            'role' => 'admin',
        ],);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
