<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCteCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cte_courses', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('course_number', 225);
            $table->string('course_title', 225);
            $table->text('program_id');
            $table->string('credits', 225);
            $table->string('job_code', 225);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cte_courses');
    }
}
