<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDestinyPhotosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destiny_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('destiny_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('destiny_id')->references('id')->on('destinies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('destiny_photos');
    }
}
