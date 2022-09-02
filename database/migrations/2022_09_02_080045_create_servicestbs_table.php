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
        Schema::create('servicestbs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('imageone')->nullable();
            $table->string('imagetwo')->nullable();
            $table->string('imagethree')->nullable();
            $table->string('imagefour')->nullable();
            $table->timestamp('time');
            $table->date('date');
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
        Schema::dropIfExists('servicestbs');
    }
};
