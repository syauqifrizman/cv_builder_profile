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
        Schema::create('Exp_Descriptions', function (Blueprint $table) {
            $table->id('detail_id');
            $table->text('description');
            // tambahin foreign_key
            $table->foreignId('experience_id')->references('experience_id')->on('Experiences')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Exp_Descriptions');
    }
};
