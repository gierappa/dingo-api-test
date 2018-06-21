<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('photo_urls');
            $table->enum('status', ['available', 'pending', 'sold']);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::create('pet_tag', function (Blueprint $table) {
            $table->integer('pet_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');;
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_tag');
        Schema::dropIfExists('pets');
    }
}
