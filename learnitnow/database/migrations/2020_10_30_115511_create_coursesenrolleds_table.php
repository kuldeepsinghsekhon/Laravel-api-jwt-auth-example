<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesenrolledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursesenrolleds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student');
            $table->integer('course');
            $table->integer('enrollment_key');
            $table->date('completed_on')->nullable();
            $table->enum('status', ['Pending', 'Complete'])->default('Pending');
            $table->foreign('student')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('coursesenrolleds');
    }
}
