<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClepDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clep_details', function (Blueprint $table) {
            $table->unsignedInteger('course_id')->primary();
            
            $table->foreign('course_id', 'fk_clep_course')->references('id')->on('catalog_courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clep_details');
    }
}
