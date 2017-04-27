<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->integer('rating');
            $table->unsignedInteger('fitness_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('fitness_id')->references('id')->on('fitness');
            $table->foreign('user_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('comments');
    }
}
