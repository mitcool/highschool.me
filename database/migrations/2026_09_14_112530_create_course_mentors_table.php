<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_mentors', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('mentor_id');
            $table->integer('course_id');
            $table->string('video')->nullable()->comment("This is for mentor page");
            $table->string('course_video', 255)->nullable()->comment("This is for course page");
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_mentors');
    }
}
