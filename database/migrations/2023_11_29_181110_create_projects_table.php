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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            // Menambahkan foreign key
            $table->foreignId('document_id')->constrained('documents')->onDelete('cascade');

            $table->string('project_name', 255)->nullable();
            // $table->date('end_date');
            $table->year('year')->nullable();
            $table->string('project_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
