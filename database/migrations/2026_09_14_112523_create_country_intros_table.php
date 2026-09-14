<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryIntrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_intros', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('country_id');
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->text('intro');
            $table->string('language', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_intros');
    }
}
