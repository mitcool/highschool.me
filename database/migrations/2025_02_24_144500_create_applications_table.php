<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('program_id');
            $table->string('learning_period');
            $table->string('starting_date');
            $table->string('name');
            $table->string('birthday');
            $table->string('gender');
            $table->string('mail');
            $table->string('phone_number');
            $table->string('country');
            $table->string('city');
            $table->string('zip');
            $table->string('address');
            $table->string('how_you_learn_about_us');
            $table->string('why_did_you_chose_us');
            $table->string('payment_option');
            $table->string('passport');
            $table->string('cv');
            $table->string('degrees');
            $table->string('reference_letter');
            $table->string('place_of_birth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
