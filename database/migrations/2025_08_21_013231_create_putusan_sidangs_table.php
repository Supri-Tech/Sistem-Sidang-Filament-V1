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
        Schema::create('putusan_sidang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sidang')->constrained('sidang')->onDelete('cascade');
            $table->longText('isi_putusan')->nullable();
            $table->date('tanggal_putusan')->nullable();
            $table->string('file_putusan')->nullable();
            $table->enum('status', ['draft', 'final'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('putusan_sidang');
    }
};
