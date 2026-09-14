<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducatorTaxDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educator_tax_details', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('tax_residency');
            $table->string('national_id_number');
            $table->string('us_tax_resident');
            $table->string('registration_number');
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
        Schema::dropIfExists('educator_tax_details');
    }
}
