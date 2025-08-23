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
        Schema::create('sidang', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('id_perkara')->constrained('perkara')->onDelete('cascade');
            $table->foreignId('id_hakim_ketua')->constrained('hakim')->onDelete('cascade');
            $table->foreignId('id_hakim_anggota_1')->constrained('hakim')->onDelete('cascade');
            $table->foreignId('id_hakim_anggota_2')->constrained('hakim')->onDelete('cascade');
            $table->foreignId('id_panitera')->constrained('hakim')->onDelete('cascade');
            $table->string('ruang_sidang');
            $table->dateTime('waktu_sidang');
            $table->enum('status', ['terjadwal', 'ditunda', 'selesai', 'batal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidang');
    }
};
