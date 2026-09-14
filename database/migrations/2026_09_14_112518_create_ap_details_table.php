<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ap_details', function (Blueprint $table) {
            $table->unsignedInteger('course_id')->primary();
            $table->string('ap_subject_code', 20)->nullable();
            $table->string('ap_exam_code', 10)->nullable();
            
            $table->foreign('course_id', 'fk_ap_course')->references('id')->on('catalog_courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ap_details');
    }
}
