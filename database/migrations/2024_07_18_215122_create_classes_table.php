<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   //create a table
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('className', 100);
            $table->integer('capacity');
            $table->boolean('isFulled');
            $table->float('price');
            $table->time('time_from');
            $table->time('time_to');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
