<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTouristsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->default('T');
            $table->text('name');
            $table->text('first_name');
            $table->text('family_name');
            $table->string('nationality');
            $table->string('sex')->default('');
            $table->integer('phone_number');
            $table->integer('reviews')->default('5');
            $table->text('preferences')->default('');
            $table->string('avatar')->default('default.jpg');
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('tourists');
    }
}
