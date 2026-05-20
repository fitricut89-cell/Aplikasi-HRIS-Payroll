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
    Schema::create('karyawans', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('jabatan_id');
    $table->string('nama');
    $table->string('email');
    $table->string('no_hp');
    $table->text('alamat');
    $table->date('tanggal_masuk');
    $table->string('status_karyawan');
    $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
