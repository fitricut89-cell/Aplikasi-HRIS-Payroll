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
    Schema::create('cutis', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('karyawan_id');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->string('jenis_cuti');
        $table->text('alasan')->nullable();
        $table->string('status')->default('Menunggu');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
