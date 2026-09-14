<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentGuardianProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_guardian_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique('parent_guardian_profiles_user_id_unique');
            $table->string('relationship_type', 50);
            $table->string('relationship_other', 255)->nullable();
            $table->boolean('can_make_educational_decisions')->default(0);
            $table->boolean('has_other_guardian_with_rights')->default(0);
            $table->string('other_guardian_full_name', 255)->nullable();
            $table->string('other_guardian_email', 255)->nullable();
            $table->string('other_guardian_phone', 50)->nullable();
            $table->timestamps();
            
            $table->foreign('user_id', 'parent_guardian_profiles_user_id_foreign')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_guardian_profiles');
    }
}
