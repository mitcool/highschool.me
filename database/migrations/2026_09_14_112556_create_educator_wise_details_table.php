<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducatorWiseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educator_wise_details', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('wise_account');
            $table->string('wise_account_email');
            $table->string('wise_option');
            $table->string('iban');
            $table->string('bic');
            $table->string('account_number');
            $table->string('routing_number');
            $table->string('billing_address');
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
        Schema::dropIfExists('educator_wise_details');
    }
}
