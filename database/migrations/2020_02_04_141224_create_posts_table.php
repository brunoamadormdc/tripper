<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->longtext('summary')->nullable();
            $table->longtext('body')->nullable();
            $table->string('price')->nullable();
            $table->string('booking_link')->nullable();
            $table->string('booking_link_text')->nullable();
            $table->string('external_link')->nullable();
            $table->string('font_text')->nullable();
            $table->string('font_link')->nullable();
            $table->string('main_image')->nullable();
            $table->string('secondary_image')->nullable();
            $table->string('page')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->boolean('published')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
