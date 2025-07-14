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
        Schema::create('cuti_history', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('id_pegawai');
                $table->year('tahun');
                $table->enum('jenis_cuti', [
                    'Tahunan',
                    'Besar',
                    'Sakit',
                    'Melahirkan',
                    'Alasan Penting',
                    'Bersama',
                    'Luar Tanggungan'
                ]);
                $table->integer('jatah')->default(0); // jatah cuti jenis itu di tahun tsb
                $table->integer('terpakai')->default(0);
                $table->timestamps();

                $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti_history');
    }
};
