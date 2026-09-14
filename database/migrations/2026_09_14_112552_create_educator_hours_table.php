<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducatorHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educator_hours', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('educator_id');
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->string('type')->nullable();
            $table->text('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educator_hours');
    }
}
