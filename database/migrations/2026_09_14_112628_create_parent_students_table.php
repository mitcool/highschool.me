<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_students', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('parent_id');
            $table->integer('student_id');
            $table->integer('status');
            $table->timestamp('expired_at')->nullable();
            $table->boolean('is_disabled')->default(0);
            $table->integer('grade')->nullable();
            $table->dateTime('grade_started_at')->nullable();
            $table->tinyInteger('track')->comment("24-track,18-track,transfer-program,single course, sessions");
            $table->text('feedback')->nullable();
            $table->bigInteger('tokens')->nullable()->comment("Tokens == questions (because of change during development)");
            $table->string('gender');
            $table->integer('student_location_id');
            $table->integer('ethnicity_id');
            $table->integer('citizenship')->comment("Country_id");
            $table->string('id_card_number');
            $table->tinyInteger('current_grade_level');
            $table->string('current_school_name');
            $table->integer('country_of_current_school')->comment("Country_id");
            $table->string('language_level');
            $table->timestamp('preffered_start_date')->default('current_timestamp()');
            $table->string('phone');
            $table->string('address');
            $table->string('address_two')->nullable();
            $table->string('zip');
            $table->string('city');
            $table->string('state')->nullable();
            $table->integer('country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_students');
    }
}
