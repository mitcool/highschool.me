<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_translations', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->text('single_page_heading');
            $table->text('small_desc');
            $table->text('text');
            $table->string('slug');
            $table->text('meta_title');
            $table->text('meta_description');
            $table->integer('program_id');
            $table->string('locale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_translations');
    }
}
