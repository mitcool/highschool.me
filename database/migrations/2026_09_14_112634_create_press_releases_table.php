<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('press_releases', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('author_id');
            $table->integer('minutes');
            $table->timestamps()->default('current_timestamp()');
            $table->timestamp('deleted_at')->nullable();
            $table->string('slug');
            $table->text('key_facts');
            $table->text('meta_title');
            $table->text('meta_description');
            $table->text('teaser');
            $table->text('heading');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('press_releases');
    }
}
