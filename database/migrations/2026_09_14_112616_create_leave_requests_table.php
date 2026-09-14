<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('student_id');
            $table->integer('type')->comment("1-medical; 2-personal");
            $table->string('file', 225);
            $table->text('message');
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->timestamp('start_date')->default('current_timestamp()');
            $table->timestamp('end_date')->default('current_timestamp()');
            $table->integer('status')->comment("0 => 'Pending', 1 => 'Approved', 2 => 'Denied'");
            $table->text('reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
}
