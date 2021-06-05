<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('roles_id',20);
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('users_id',20);
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
