<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducatorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educator_details', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->integer('nationality');
            $table->integer('country_of_residence');
            $table->string('timezone');
            $table->string('national_id_number');
            $table->text('languages');
            $table->integer('educator_id');
            $table->integer('consent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educator_details');
    }
}
