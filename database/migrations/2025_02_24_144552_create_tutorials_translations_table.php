<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorialsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorials_translations', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('tutorial_id');
            $table->string('name');
            $table->string('slug');
            $table->text('text');
            $table->string('video');
            $table->string('locale', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutorials_translations');
    }
}
