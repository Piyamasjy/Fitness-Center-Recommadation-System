<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('fitness', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fitness_ename',80);
            $table->string('fitness_tname',80);
            $table->string('addresses');
            $table->string('website',50);
            $table->string('contact_number',15);
            $table->double('lat');
            $table->double('lng');
            $table->string('image');
            $table->text('description');
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
        Schema::drop('fitness');
    }
}
