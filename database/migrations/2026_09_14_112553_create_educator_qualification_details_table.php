<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducatorQualificationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educator_qualification_details', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('educator_id');
            $table->string('degree');
            $table->string('field_of_study');
            $table->string('institution');
            $table->string('academic_country');
            $table->string('year_of_graduation');
            $table->string('gpa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educator_qualification_details');
    }
}
