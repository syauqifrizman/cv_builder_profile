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
        Schema::create('Pr_Details', function (Blueprint $table) {
            $table->id('detail_id');
            // Menambahkan foreign key
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('Projects')->onDelete('cascade');

            $table->string('description', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pr_Details');
    }
};
