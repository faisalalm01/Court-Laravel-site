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
        Schema::create('notifications', function (Blueprint $table) {

            $table->id('id_notification');
            // relasi ke user penerima notifikasi
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            // optional: kalau notifikasi terkait pegawai tertentu (misalnya yg mengajukan cuti)
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->onDelete('set null');
            // optional: kalau notifikasi terkait pengajuan cuti tertentu
            $table->unsignedBigInteger('id_cutipegawai')->nullable();
            $table->foreign('id_cutipegawai')->references('id_cutipegawai')->on('cuti_pegawai')->onDelete('set null');
            // tipe notifikasi (misal: cuti_pengajuan, cuti_disetujui, cuti_batas_jabatan, dsb)
            $table->string('tipe')->nullable(true);
            $table->text('pesan')->nullable(true);
            $table->boolean('dibaca')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
