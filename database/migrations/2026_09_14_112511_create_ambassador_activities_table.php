<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbassadorActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambassador_activities', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('service_id')->nullable();
            $table->integer('action_id')->nullable();
            $table->text('link')->nullable();
            $table->string('status', 225)->nullable();
            $table->integer('redeem_points')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('ambassador_activities');
    }
}
