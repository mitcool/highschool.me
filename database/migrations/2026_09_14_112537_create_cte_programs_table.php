<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCteProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cte_programs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('cluster_id');
            $table->unsignedSmallInteger('category_id')->nullable()->comment("for the new CTE logic");
            $table->string('program_number', 225);
            $table->text('program_title');
            
            $table->foreign('category_id', 'fk_cte_programs_category')->references('id')->on('course_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cte_programs');
    }
}
