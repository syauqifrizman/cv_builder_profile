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
        Schema::create('Projects', function (Blueprint $table) {
            $table->id('project_id');
            // Menambahkan foreign key
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')->references('document_id')->on('Documents')->onDelete('cascade');

            $table->string('project_name', 255);
            $table->date('end_date');
            $table->string('project_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Projects');
    }
};
