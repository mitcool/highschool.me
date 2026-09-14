<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_id');
            $table->string('label', 255)->nullable()->comment("use as a name");
            $table->text('stored_path')->comment("link to file");
            $table->integer('position')->nullable();
            $table->timestamps();
            
            $table->foreign('course_id', 'fk_course_files_course')->references('id')->on('catalog_courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_files');
    }
}
