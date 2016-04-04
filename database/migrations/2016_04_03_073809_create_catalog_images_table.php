<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_images', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')->default(true);
            $table->string('image_name')->unique();
            $table->string('image_path');
            $table->string('image_thumbnail')->unique();
            $table->string('image_thumbnail_path');
            $table->string('image_title')->nullable();
            $table->text('image_description');
            $table->integer('quantity')->unsigned()->default('1');
            $table->float('price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalog_images');
    }
}
