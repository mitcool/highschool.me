<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectiveCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elective_courses', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('category_id');
            $table->string('fldoe_course_code', 225);
            $table->string('course_title', 225);
            $table->string('credits', 225);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elective_courses');
    }
}
