<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fldoe_course_code', 20)->nullable();
            $table->string('course_number', 20)->nullable();
            $table->string('title', 255);
            $table->decimal('default_credits', 3, 1)->nullable();
            $table->integer('source_cte_course_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_courses');
    }
}
