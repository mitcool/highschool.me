<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('address_two')->nullable();
            $table->string('zip')->nullable();
            $table->integer('user_id');
            $table->integer('country_id');
            $table->string('phone')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
