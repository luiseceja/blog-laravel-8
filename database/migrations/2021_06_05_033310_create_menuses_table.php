<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuses', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('menus_id')->nullable();
           $table->foreign('menus_id')->references('id')->on('menuses')->onDelete('cascade')->onUpdate('restrict');
           $table->string('nombre');
           $table->string('url');
           $table->unsignedInteger('orden')->default(1);
           $table->string('icono')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuses');
    }
}
