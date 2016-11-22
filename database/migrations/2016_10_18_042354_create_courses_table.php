<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->string('imagePath')->nullable(); //image for course - how do we set a default? How do we allow upload when Admin creates course?
			$table->string('title');
			$table->text('description');
			$table->float('price');
            $table->integer('participants')->default(0);  //number of participants enrolled
            $table->integer('participant_limit')->default(30);  //number of participants (seats) available
            $table->string('instructor');  //instructor; should be chosen from a list (STILL NEED TO DO!)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
