<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('slug');
            $table->string('route_en');
            $table->string('route_es');
            $table->string('route_bg');
            $table->string('route_de');
            $table->string('route_ru');
            $table->string('action');
            $table->tinyInteger('sitemap');
            $table->text('sitemap_name_en');
            $table->text('sitemap_name_de');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
