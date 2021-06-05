<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('posts_id');
           $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('restrict');;
           $table->unsignedBigInteger('tags_id');
           $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_tags');
    }
}