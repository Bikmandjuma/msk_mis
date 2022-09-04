<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizen_complains', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('complains');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('tasker_roles')->onDelete('cascade');
            $table->string('forward')->nullable();
            $table->string('date_co')->nullable();
            $table->string('time_co')->nullable();
            $table->string('complains_reply')->nullable();
            $table->string('decision')->nullable();
            $table->string('replied_date')->nullable();
            $table->string('replied_time')->nullable();
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
        Schema::dropIfExists('citizen_complains');
    }
};
