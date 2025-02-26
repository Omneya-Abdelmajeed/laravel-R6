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
    {
        Schema::create('cars', function (Blueprint $table) {
             //create columns for carTitle, description, price, published
            $table->id();
            $table->string('carTitle', 100);
            $table->text('description');
            $table->float('price'); 
            $table->boolean('published');
            $table->string('image', 50);
            $table->foreignId('category_id')->constrained('categories');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
