<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_requests', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->string('last_name');
            $table->string('mail');
            $table->string('phonecode');
            $table->string('phone_number');
            $table->string('program_name');
            $table->string('how_did_you_find');
            $table->string('communication_language');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_requests');
    }
}
