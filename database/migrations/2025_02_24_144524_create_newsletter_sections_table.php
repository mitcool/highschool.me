<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsletterSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_sections', function (Blueprint $table) {
            $table->id();
            $table->string('image', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->text('content')->nullable();
            $table->text('content_de')->nullable();
            $table->integer('newsletter_id');
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
        Schema::dropIfExists('newsletter_sections');
    }
}
