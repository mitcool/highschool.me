<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreExamAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_exam_answers', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('exam_id');
            $table->integer('question_id');
            $table->text('answer')->nullable();
            $table->timestamps()->default('current_timestamp()');
            
            $table->foreign('exam_id', 'pre_exam_answers_exam_id_foreign')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('question_id', 'pre_exam_answers_question_id_foreign')->references('id')->on('exam_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_exam_answers');
    }
}
