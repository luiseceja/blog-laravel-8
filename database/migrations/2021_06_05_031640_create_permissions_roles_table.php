<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permissions_id',20);
            $table->foreign('permissions_id')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('roles_id',20);
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_roles');
    }
}