<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siteblocs', function (Blueprint $table) {
            $table->id();
            $table->integer('sitepages_id')->nullable();
            $table->integer('sitesliders_id')->nullable();
            $table->string('title',255)->nullable();
            $table->text('content')->nullable();
            $table->text('content_two')->nullable();
            $table->string('image',255)->nullable();
            $table->string('title_img',255)->nullable();
            $table->string('alt_img',255)->nullable();
            $table->string('url_image',255)->nullable();
            $table->string('format',20)->nullable();
            $table->integer('sort')->nullable();
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
        Schema::dropIfExists('blocs');
    }
}
