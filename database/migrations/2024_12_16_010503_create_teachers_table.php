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
             // Tabel Teachers (Guru)
             Schema::create('teachers', function (Blueprint $table) {
                $table->id();
                $table->string('name'); // Nama guru
                $table->string('email')->unique(); // Email guru
                $table->string('phone')->nullable(); // Nomor telepon guru (opsional)
                $table->unsignedBigInteger('borrower_id')->nullable(); // Add the column
                $table->foreign('borrower_id')->references('id')->on('borrowers')->onDelete('cascade');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
