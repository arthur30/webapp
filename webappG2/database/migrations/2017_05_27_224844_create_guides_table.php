<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->increments('guide_id');
            $table->text('first_name');
            $table->text('family_name');
            $table->string('nationality');
            $table->text('home_town');
            $table->string('sex')->default('');
            $table->integer('phone_number');
            $table->text('education');
            $table->string('avatar')->default('default.jpg');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('reviews')->default('5');
            $table->text('description')->default('');
            $table->rememberToken();
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
        Schema::dropIfExists('guides');
    }
}
