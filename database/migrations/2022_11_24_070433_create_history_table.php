<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_admin");
            $table->unsignedBigInteger("id_kupon");
            $table->timestamps();
        });

        Schema::table('history', function (Blueprint $table) {
            $table->foreign('id_admin')->references('id')->on('admin');
            $table->foreign('id_kupon')->references('id')->on('kupon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history');
    }
};