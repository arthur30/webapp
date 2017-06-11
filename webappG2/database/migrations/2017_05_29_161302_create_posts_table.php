<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tourist_id');
            $table->integer('guide_id')->default('-1');
            $table->text('title');
            $table->timestamp('start_time');
            $table->string('country');
            $table->text('city');
            $table->text('location');
            $table->text('tourist_name');
            $table->text('guide_name')->default('');
            $table->integer('fee')->default('-1');
            $table->boolean('finished')->default('false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
