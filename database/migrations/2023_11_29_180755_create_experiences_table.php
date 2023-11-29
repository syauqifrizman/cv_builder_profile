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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 255);
            $table->string('position', 255);
            $table->string('company_location', 255);
            $table->string('company_description', 255)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            // foreign key type_id
            $table->foreignId('document_id')->constrained('documents')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
