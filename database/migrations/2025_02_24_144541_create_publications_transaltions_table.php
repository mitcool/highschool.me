<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTransaltionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications_transaltions', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('publication_id');
            $table->string('locale');
            $table->string('heading');
            $table->text('summary');
            $table->string('ISBN');
            $table->string('language');
            $table->string('slug');
            $table->text('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications_transaltions');
    }
}
