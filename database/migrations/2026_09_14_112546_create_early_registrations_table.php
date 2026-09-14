<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarlyRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('early_registrations', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->string('middlename')->nullable();
            $table->string('surname');
            $table->string('email');
            $table->text('message')->nullable();
            $table->integer('education_option');
            $table->integer('country_id');
            $table->timestamps()->default('current_timestamp()');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('early_registrations');
    }
}
