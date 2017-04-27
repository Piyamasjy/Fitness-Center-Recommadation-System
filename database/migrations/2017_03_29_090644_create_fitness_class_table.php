<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('fitness_class', function (Blueprint $table) {
            $table->unsignedInteger('fitness_id');
            $table->unsignedInteger('class_id');
            $table->primary(array('fitness_id', 'class_id'));
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('fitness_class');
    }
}
