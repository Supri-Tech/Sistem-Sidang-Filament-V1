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
        Schema::create('agenda_sidang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sidang')->constrained('sidang')->onDelete('cascade');
            $table->string('judul_agenda');
            $table->text('deskripsi')->nullable();
            $table->integer('urutan')->default(1);
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->enum('status_agenda', ['terjadwal', 'berlangsung', 'selesai'])->default('terjadwal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_sidang');
    }
};
