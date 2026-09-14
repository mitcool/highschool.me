<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsolDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esol_details', function (Blueprint $table) {
            $table->unsignedInteger('course_id')->primary();
            $table->string('lld_level', 50)->nullable();
            $table->string('cefr_level', 10)->nullable();
            
            $table->foreign('course_id', 'fk_esol_course')->references('id')->on('catalog_courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('esol_details');
    }
}
