<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siteslidersimages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sliders_id');
            $table->integer('sort');
            $table->string('picture',255);
            $table->string('title',255)->nullable();
            $table->string('url',255)->nullable();
            $table->text('content')->nullable();
            $table->string('status',5);
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
        Schema::dropIfExists('slider_images');
    }
}
