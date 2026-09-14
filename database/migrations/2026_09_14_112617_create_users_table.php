<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('middlename')->nullable();
            $table->string('surname');
            $table->string('email')->unique('users_email_unique');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('role_id')->default(1);
            $table->timestamp('date_of_birth')->nullable();
            $table->tinyInteger('employment_type')->nullable()->comment("freelancer => 0; employee => 1");
            $table->boolean('is_counsellor')->nullable()->comment("counsellor => 1; not a counsellor => 0");
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('confirmation_code', 225);
            $table->boolean('is_verified')->default(0);
            $table->tinyInteger('must_change_password')->nullable()->comment("this is for students only; 1=>should change 0=>changed");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
