<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducatorTechincalSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educator_techincal_setups', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('camera');
            $table->string('microphone');
            $table->string('internet_speed');
            $table->string('quiet_place');
            $table->string('platform_experience');
            $table->integer('educator_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educator_techincal_setups');
    }
}
