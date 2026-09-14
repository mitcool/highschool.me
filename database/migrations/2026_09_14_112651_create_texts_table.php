<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texts', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->text('text_en')->nullable();
            $table->text('text_de')->nullable();
            $table->text('text_bg')->nullable();
            $table->text('text_es')->nullable();
            $table->text('text_ru')->nullable();
            $table->tinyInteger('editor');
            $table->string('title');
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('texts');
    }
}
