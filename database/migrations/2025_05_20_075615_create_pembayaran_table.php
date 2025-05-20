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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_booking')->constrained('booking')->onDelete('cascade');
            $table->foreignId('id_pengguna')->constrained('pengguna')->onDelete('cascade');
            $table->string('metode_bayar');
            $table->string('bukti_bayar')->nullable();
            $table->boolean('status_verifikasi')->default(false);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
