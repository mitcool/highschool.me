<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('iso')->default('');
            $table->string('name')->default('');
            $table->string('nicename')->default('');
            $table->string('nicename_de')->nullable();
            $table->string('iso3')->nullable();
            $table->tinyInteger('numcode')->nullable();
            $table->integer('phonecode')->nullable();
            $table->string('flag')->default('');
            $table->decimal('vat_rate', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
