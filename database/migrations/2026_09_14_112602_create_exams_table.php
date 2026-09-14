<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->timestamp('datetime')->default('current_timestamp()');
            $table->integer('course_id');
            $table->integer('student_id');
            $table->integer('educator_id');
            $table->tinyInteger('type');
            $table->tinyInteger('status');
            $table->double('grade')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('pre_exam');
            $table->tinyInteger('reminder')->nullable();
            $table->timestamps()->default('current_timestamp()');
            $table->timestamp('passed_at')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('evaluated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('admin_id');
            $table->string('topic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
