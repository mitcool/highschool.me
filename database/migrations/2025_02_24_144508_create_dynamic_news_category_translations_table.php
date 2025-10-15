<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicNewsCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_news_category_translations', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('category_id');
            $table->string('locale');
            $table->string('name');
            $table->string('slug');
            $table->string('headline');
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
        Schema::dropIfExists('dynamic_news_category_translations');
    }
}
