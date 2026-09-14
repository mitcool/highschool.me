<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_news', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('author_id');
            $table->integer('minutes');
            $table->string('slug');
            $table->text('key_facts');
            $table->timestamps()->default('current_timestamp()');
            $table->timestamp('deleted_at')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('dynamic_news');
    }
}
