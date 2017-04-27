<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessTypesportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('fitness_typesports', function (Blueprint $table) {
            $table->unsignedInteger('fitness_id');
            $table->unsignedInteger('type_id');
            $table->primary(array('fitness_id', 'type_id'));
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
        Schema::drop('fitness_typesports');
    }
}
