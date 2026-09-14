<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_id');
            $table->string('title', 255);
            $table->string('url', 2048);
            $table->unsignedInteger('position')->default(0);
            $table->timestamps();
            
            $table->foreign('course_id', 'fk_course_videos_course')->references('id')->on('catalog_courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_videos');
    }
}
