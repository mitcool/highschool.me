<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducatorExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educator_experiences', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('company');
            $table->string('position');
            $table->string('experience_country');
            $table->string('from');
            $table->string('to');
            $table->integer('educator_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educator_experiences');
    }
}
