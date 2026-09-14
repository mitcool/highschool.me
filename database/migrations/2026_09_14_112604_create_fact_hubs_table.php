<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactHubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fact_hubs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('author_id');
            $table->integer('minutes');
            $table->text('key_facts');
            $table->string('slug');
            $table->string('image');
            $table->text('meta_title');
            $table->text('meta_description');
            $table->timestamps()->default('current_timestamp()');
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
        Schema::dropIfExists('fact_hubs');
    }
}
