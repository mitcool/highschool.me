<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_verifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('verification_token', 64)->nullable()->unique('login_verifications_verification_token_unique');
            $table->string('ip_address', 45)->index('login_verifications_ip_address_index');
            $table->text('user_agent')->nullable();
            $table->string('pin_code', 10)->nullable();
            $table->unsignedTinyInteger('attempts')->default(0);
            $table->enum('status', ['pending', 'approved', 'expired', 'failed'])->default('pending');
            $table->dateTime('expires_at')->nullable()->index('login_verifications_expires_at_index');
            $table->dateTime('verified_at')->nullable();
            $table->dateTime('logout_at')->nullable();
            $table->timestamps()->default('current_timestamp()');
            
            $table->index(['user_id', 'status'], 'login_verifications_user_status_index');
            $table->foreign('user_id', 'login_verifications_user_id_foreign')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_verifications');
    }
}
