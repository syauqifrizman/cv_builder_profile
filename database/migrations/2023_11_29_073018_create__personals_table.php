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
        Schema::create('Personals', function (Blueprint $table) {
            $table->id('personal_id');
            $table->foreignId('document_id')->constrained()->onDelete('cascade');
            $table->string('fullname', 255);
            $table->string('domicile', 255);
            $table->string('email', 255);
            $table->string('phone_number', 255);
            $table->string('linkedin_url', 255);
            $table->string('portofolio_url', 255)->nullable();
            $table->text('description');
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Personals');
    }
};
