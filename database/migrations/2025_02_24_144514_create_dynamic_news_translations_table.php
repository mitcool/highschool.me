<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicNewsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_news_translations', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('locale', 2);
            $table->string('slug');
            $table->integer('news_id');
            $table->timestamp('deleted_at')->nullable();
            $table->text('meta_title');
            $table->text('meta_description');
            $table->text('key_facts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dynamic_news_translations');
    }
}
