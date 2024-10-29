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
        Schema::create('cuti_pegawai', function (Blueprint $table) {
            $table->id('id_cutipegawai');
            $table->unsignedBigInteger('id_pegawai');
            $table->string('jenis_cuti', 255);
            $table->string('alasan_cuti', 255)->nullable();
            $table->string('lama_cuti', 255)->nullable();
            $table->string('ket_lama_cuti', 255)->nullable();
            $table->string('dari_tanggal', 255)->nullable();
            $table->string('sampai_dengan', 255)->nullable();
            $table->string('panmud_kasubag', 255)->nullable();
            $table->string('panitera_sekretaris', 255)->nullable();
            $table->string('ketua', 255)->nullable();
            $table->integer('app_panmud_kasubag')->nullable();
            $table->integer('app_panitera_sekretaris')->nullable();
            $table->integer('app_ketua')->nullable();
            $table->string('status_cuti', 255)->nullable();
            $table->string('ket_status_cuti', 255)->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti_pegawai');
    }
};
