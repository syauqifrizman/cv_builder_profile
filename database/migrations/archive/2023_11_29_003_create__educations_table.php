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
        Schema::create('Educations', function (Blueprint $table) {
            $table->id('');
            $table->foreignId('document_id')->constrained('documents')->onDelete('cascade');
            $table->string('education_name', 255);
            $table->string('education_location', 255);
            $table->string('education_level', 255);
            $table->string('education_major', 255);
            $table->float('current_score', 5, 2)->nullable();
            $table->float('max_score', 5, 2)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('related_coursework')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Educations');
    }
};
