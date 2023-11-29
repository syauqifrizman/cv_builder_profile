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
        Schema::create('Skills_Others', function (Blueprint $table) {
            $table->id('skill_other_id');
            // Menambahkan foreign key
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')->references('document_id')->on('Documents')->onDelete('cascade');

            $table->string('title', 255);
            $table->string('description', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Skills_Others');
    }
};
