<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeFactRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_fact_requests', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('gender');
            $table->string('firstname');
            $table->string('surname');
            $table->string('phone');
            $table->string('phonecode');
            $table->string('program');
            $table->string('communication_language');
            $table->string('email');
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
        Schema::dropIfExists('free_fact_requests');
    }
}
