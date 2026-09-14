<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressReleaseCitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('press_release_citations', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('news_id');
            $table->string('media_name');
            $table->timestamp('date')->default('current_timestamp()');
            $table->string('pdf_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('press_release_citations');
    }
}
