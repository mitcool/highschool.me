<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicNewsAuthorsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_news_authors_translations', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('locale');
            $table->text('description');
            $table->integer('author_id');
            $table->string('name');
            $table->string('avatar');
            $table->string('slug');
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dynamic_news_authors_translations');
    }
}
