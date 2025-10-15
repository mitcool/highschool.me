<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_translations', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('study_id');
            $table->string('locale', 2);
            $table->string('name');
            $table->string('slug');
            $table->string('heading');
            $table->text('description');
            $table->string('programs_heading');
            $table->text('meta_title');
            $table->text('meta_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_translations');
    }
}
