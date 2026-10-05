<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPositionToNewsAndPressReleaseSectionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dynamic_news_sections', function (Blueprint $table) {
            $table->integer('position')->default(0)->after('type');
        });
        Schema::table('press_release_sections', function (Blueprint $table) {
            $table->integer('position')->default(0)->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dynamic_news_sections', function (Blueprint $table) {
            $table->dropColumn('position');
        });
        Schema::table('press_release_sections', function (Blueprint $table) {
            $table->dropColumn('position');
        });
    }
}
