<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->text('feature');
            $table->string('category_id');
            $table->string('pro');
            $table->string('core');
            $table->string('elite');
            $table->text('core_tooltip')->nullable();
            $table->text('pro_tooltip')->nullable();
            $table->text('elite_tooltip')->nullable();
            $table->integer('_order')->default(1);
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
