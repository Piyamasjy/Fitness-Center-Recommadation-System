<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessWorkserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('fitness_workservices', function (Blueprint $table) {
            $table->unsignedInteger('fitness_id');
            $table->unsignedInteger('work_id');
            $table->primary(array('fitness_id', 'work_id'));
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fitness_workservices');
    }
    
}
