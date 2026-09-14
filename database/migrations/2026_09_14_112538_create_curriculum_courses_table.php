<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('curriculum_type_id');
            $table->unsignedInteger('course_id');
            $table->unsignedSmallInteger('category_id')->nullable();
            $table->boolean('required_flag')->default(0);
            $table->string('requirement_text', 255)->nullable();
            $table->text('notes')->nullable();
            $table->integer('program_id')->nullable()->comment("for CTE courses");
            $table->integer('job_id')->nullable()->comment("for CTE courses");
            $table->timestamps();
            
            $table->unique(['curriculum_type_id', 'course_id'], 'uq_curriculum_course');
            $table->foreign('category_id', 'fk_cc_category')->references('id')->on('course_categories');
            $table->foreign('course_id', 'fk_cc_course')->references('id')->on('catalog_courses');
            $table->foreign('curriculum_type_id', 'fk_cc_curriculum_type')->references('id')->on('curriculum_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_courses');
    }
}
