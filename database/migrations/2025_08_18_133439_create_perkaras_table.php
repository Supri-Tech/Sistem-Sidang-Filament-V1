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
        Schema::create('perkara', function (Blueprint $table) {
            $table->id();
            $table->string('no_perkara', 32);
            $table->string('jenis_perkara');
            $table->string('email_terdakwa');
            $table->string('wa_terdakwa');
            $table->string('terdakwa');
            $table->string('korban');
            $table->string('email_korban');
            $table->string('wa_korban');
            $table->enum('status', ['aktif', 'ditutup', 'banding', 'kasasi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkara');
    }
};
