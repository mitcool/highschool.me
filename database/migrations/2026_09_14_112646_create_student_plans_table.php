<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_plans', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('student_id')->comment("It is related to ParentStudent model");
            $table->integer('plan_id');
            $table->integer('type')->comment("Month = 0,Year =1");
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('student_plans');
    }
}
