<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('study_id');
            $table->boolean('has_promotion')->default(0);
            $table->string('redeem_code')->nullable();
            $table->integer('redeemed_fee')->nullable();
            $table->boolean('fast_track')->default(0);
            $table->boolean('is_new');
            $table->integer('enrollment_fee');
            $table->integer('examination_fee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
