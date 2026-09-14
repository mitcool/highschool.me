<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number', 11);
            $table->string('user_email');
            $table->bigInteger('user_id');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('VAT_number', 11)->nullable();
            $table->dateTime('created_at');
            $table->string('name')->nullable();
            $table->string('surname', 225);
            $table->string('street')->nullable();
            $table->string('street_number', 225)->nullable();
            $table->string('city')->nullable();
            $table->string('ZIPcode')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('country_id');
            $table->boolean('is_memo')->nullable()->comment("0 - invoice; 1 - credit memo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
