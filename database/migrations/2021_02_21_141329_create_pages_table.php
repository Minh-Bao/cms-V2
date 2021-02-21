<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitepage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lng',2);
            $table->string('last_review',6)->nullable();
            $table->string('paginate',6)->nullable();
            $table->integer('status');
            $table->string('name',255)->nullable();
            $table->string('title',255)->nullable();
            $table->string('title_article',255)->nullable();
            $table->string('slug',255)->unique();
            $table->string('thumbnail',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('alt_img',255)->nullable();
            $table->string('title_img',255)->nullable();
            $table->string('meta_title',255)->nullable();
            $table->string('meta_desc',255)->nullable();
            $table->string('author',255)->nullable();
            $table->text('content')->nullable();
            $table->integer('count')->nullable();
            $table->integer('slider_id')->nullable();
            $table->string('model',20)->nullable();
            $table->integer('translate_id')->nullable();
            $table->timestamp('schedul')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
