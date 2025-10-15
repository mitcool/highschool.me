<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqCategoriesTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_categories_translation', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('category_id');
            $table->string('slug');
            $table->string('name');
            $table->string('locale', 2);
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
        Schema::dropIfExists('faq_categories_translation');
    }
}
