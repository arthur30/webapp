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
            $table->text('first_name');
            $table->text('family_name');
            $table->string('nationality');
            $table->string('email_address')->unique();
            $table->integer('phone_number');
            $table->integer('stars');
            $table->text('preferences');
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
