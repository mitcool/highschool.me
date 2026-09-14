<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_categories', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned()->primary();
            $table->unsignedTinyInteger('curriculum_type_id');
            $table->unsignedSmallInteger('subject_area_id')->nullable();
            $table->string('name', 150);
            $table->integer('_order');
            
            $table->foreign('curriculum_type_id', 'fk_cat_curriculum_type')->references('id')->on('curriculum_types');
            $table->foreign('subject_area_id', 'fk_cat_subject_area')->references('id')->on('subject_areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_categories');
    }
}
