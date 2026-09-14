<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryDiplomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_diplomas', function (Blueprint $table) {
            $table->id();
            $table->string('first_section');
            $table->string('second_section');
            $table->string('third_section');
            $table->string('fourth_section');
            $table->string('fifth_section');
            $table->integer('country_id');
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
        Schema::dropIfExists('country_diplomas');
    }
}
